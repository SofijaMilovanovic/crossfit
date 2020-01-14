<?php
require 'flight/Flight.php';

Flight::route('GET /wods', function(){
    header("Content-Type: application/json; charset=utf-8");
    $konekcija = new Mysqli('localhost','root','','crossfit');
    $konekcija->set_charset('utf8');

    $sql = "SELECT * FROM wod";
    $resultSet = $konekcija->query($sql);
    $niz = [];
    while ($red = $resultSet->fetch_object()){
        $niz[] = $red;
    }
    echo json_encode($niz);
});

Flight::route('GET /rezultati/@id', function($id){
    header("Content-Type: application/json; charset=utf-8");
    $konekcija = new Mysqli('localhost','root','','crossfit');
    $konekcija->set_charset('utf8');

    $sql = "SELECT * FROM user_times WHERE wod_id = ".$id;
    $resultSet = $konekcija->query($sql);
    $niz = [];
    while ($red = $resultSet->fetch_object()){
        $niz[] = $red;
    }
    echo json_encode($niz);
});

Flight::route('GET /users', function(){
    header("Content-Type: application/json; charset=utf-8");
    $konekcija = new Mysqli('localhost','root','','crossfit');
    $konekcija->set_charset('utf8');

    $sql = "SELECT user_id,first_name,last_name FROM user";
    $resultSet = $konekcija->query($sql);
    $niz = [];
    while ($red = $resultSet->fetch_object()){
        $niz[] = $red;
    }
    echo json_encode($niz);
});

Flight::route('POST /promeniUAdmina', function()
{
    header("Content-Type: application/json; charset=utf-8");
    $konekcija = new Mysqli('localhost','root','','crossfit');
    $konekcija->set_charset('utf8');
    $podaci = file_get_contents('php://input');
    $niz = json_decode($podaci,true);
    $userId = $niz['userID'];
    $sql = "UPDATE user set admin='Admin' WHERE user_id = ".$userId;
    if($konekcija->query($sql))
    {
        echo (json_encode("Uspesno promenjena administratorska rola"));
    }
    else
    {
        echo (json_encode("Neuspesno. Doslo je do greske."));
    }
});

Flight::start();
