<?php
require 'db/Baza.php';
require 'klase/User.php';
require 'klase/Type.php';
require 'klase/Wod.php';

$konekcija = new Mysqli('localhost','root','','crossfit');
$konekcija->set_charset('utf8');

$baza  = new Baza($konekcija);

//sesija
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = [];
}