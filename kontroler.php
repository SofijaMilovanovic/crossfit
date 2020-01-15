<?php
include "autoload.php";
$akcija = $_GET['akcija'];

if($akcija == 'svi_treninzi'){
    include 'delovi/svi_treninzi.php';
}

if($akcija == 'login'){
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $user = $baza->login($username,$password);
    if($user){
        $_SESSION['user'] = $user;
        header("Location: index.php");
    }else{
        header("Location: login.php?greska=Doslo je do greske prilikom logovanja");
    }
}

if($akcija == 'registracija'){
    $ime = strip_tags($_POST['ime']);
    $prezime = strip_tags($_POST['prezime']);
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $uspesno = $baza->registracija($ime,$prezime,$username,$password);
    if($uspesno){
        header("Location: register.php?greska=Uspesno ste se registrovali. Mozete se ulogovati sa vasom sifrom i korisnickim imenom.");
    }else{
        header("Location: register.php?greska=Doslo je do greske prilikom registracije.Obratite se administratorima.");
    }
}

if($akcija == 'unosVremena'){
    $wodID = strip_tags($_POST['wodID']);
    $userID = strip_tags($_POST['userID']);
    $minuti = strip_tags($_POST['minuti']);
    $sekunde = strip_tags($_POST['sekunde']);
    $uspesno = $baza->unesiVreme($wodID,$userID,$minuti,$sekunde);
    if($uspesno){
        header("Location: rezultati.php");
    }else{
        header("Location: unesiVreme.php?greska=Doslo je do greske prilikom unosa vremena.Obratite se administratorima.");
    }
}

if($akcija == 'svi_rezultati'){
    include 'delovi/svi_rezultati.php';
}
if($akcija == 'obrisi'){
    $id = strip_tags($_GET['id']);

    $uspesno = $baza->obrisiRezultat($id);
    if($uspesno){
        echo "Uspesno obrisan rezultat";
    }else{
        echo "Neuspesno obrisan rezultat";
    }
}

if($akcija == 'grafik'){
    echo json_encode($baza->vratiPodatkeZaGrafik());
}
