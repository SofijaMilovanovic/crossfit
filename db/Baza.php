<?php
class Baza
{
    /** @var Mysqli $konekcija */
    private $konekcija;

    /**
     * Baza constructor.
     * @param $konekcija
     */
    public function __construct($konekcija)
    {
        $this->konekcija = $konekcija;
    }

    public function vratiTreninge()
    {
        $wods = [];

        $sql = "SELECT * FROM wod w join type t on w.type_id = t.type_id";

        $resultSet = $this->konekcija->query($sql);

        while ($red = $resultSet->fetch_object()){
            $wods[] = new Wod($red->id,$red->wod_name,$red->wod_desc,new Type($red->type_id,$red->type_name),$red->difficulty);
        }

        return $wods;
    }

    public function login($username, $password)
    {
        $u = $this->konekcija->real_escape_string($username);
        $p = $this->konekcija->real_escape_string($password);

        $sql = "SELECT * FROM user WHERE username = '".$u."' AND password='".$p."'";
        $resultSet = $this->konekcija->query($sql);

        while ($red = $resultSet->fetch_object()){
            return new User($red->user_id,$red->first_name,$red->last_name,$red->username,$red->password,$red->admin);
        }

        return null;
    }

    public function registracija($ime, $prezime, $username, $password)
    {
        $i = $this->konekcija->real_escape_string($ime);
        $pr = $this->konekcija->real_escape_string($prezime);
        $u = $this->konekcija->real_escape_string($username);
        $p = $this->konekcija->real_escape_string($password);

        $sql = "INSERT INTO user(first_name,last_name,username,password) VALUES ('".$i."','".$pr."','".$u."','".$p."')";
        return $this->konekcija->query($sql);
    }

    public function unesiVreme($wodID, $userID, $minuti, $sekunde)
    {
        $wodID = $this->konekcija->real_escape_string($wodID);
        $userID = $this->konekcija->real_escape_string($userID);
        $minuti = $this->konekcija->real_escape_string($minuti);
        $sekunde= $this->konekcija->real_escape_string($sekunde);

        $sql = "INSERT INTO user_times VALUES (null,{$userID},{$wodID},{$minuti},{$sekunde})";
        return $this->konekcija->query($sql);
    }

    public function vratiSveRezulate()
    {
        $sql = "SELECT * FROM user_times ut join wod w on ut.wod_id = w.id join user u on ut.user_id = u.user_id ORDER BY minutes asc,seconds asc";
        $rezultati = [];
        $resultSet = $this->konekcija->query($sql);

        while ($red = $resultSet->fetch_object()) {
            $rezultati[] = $red;
        }

        return $rezultati;
    }

    public function obrisiRezultat($id)
    {
        $id= $this->konekcija->real_escape_string($id);

        $sql = "DELETE FROM user_times WHERE user_time_id =".$id;
        return $this->konekcija->query($sql);
    }

    public function vratiPodatkeZaGrafik()
    {
        $sql = "SELECT w.wod_name, count(ut.user_time_id) as brojVremena FROM user_times ut join wod w on ut.wod_id = w.id GROUP BY ut.wod_id";
        $rezultati = [];
        $resultSet = $this->konekcija->query($sql);

        while ($red = $resultSet->fetch_object()) {
            $rezultati[] = $red;
        }

        return $rezultati;
    }
}