<?php

class GetPersonData
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function GetData()
    {

        $user_info = $this->db->query('SELECT user.ID, user.username, user.email, user.geboortedatum, user.height, user.gender, user.roker, user.drugs, weight.weights
                                FROM user INNER JOIN weight ON weight.ID WHERE user.email = ? AND weight.user_id = ?', $_SESSION['user_email'], $_SESSION['user_id'])->fetchArray();

        $age = $this->db->query('SELECT geboortedatum FROM user WHERE user.id = ?', $_SESSION['user_id'])->fetchArray();
        $this->db;

        $ageUserDB = $age['geboortedatum'];
        $splittedDate = explode("-", $ageUserDB);
        $engelseFormatDateUser = $splittedDate[2] . "/" . $splittedDate[1] . "/" . $splittedDate[0];

        $tz = new DateTimeZone('Europe/Brussels');
        $age = DateTime::createFromFormat('d/m/Y', $engelseFormatDateUser, $tz)->diff(new DateTime('now', $tz))->y;

        if ($user_info['roker'] === 1)
        {
            $isRoker = 'Ja';
        } elseif ($user_info['roker'] === 0)
        {
            $isRoker = 'Nee';
        }

        if ($user_info['drugs'] === 1)
        {
            $isDrugUser = 'Ja';
        } elseif ($user_info['drugs'] === 0)
        {
            $isDrugUser = 'Nee';
        }

        $gewicht = $user_info['weights'] . " KG";
        $lengte = $_SESSION['height'] . " M";
        $leeftijd = $age . " jaar";
        $roken = $isRoker;
        $drugs = $isDrugUser;

        echo "<p style='text-align: center; font-size: 20px; font-weight: bold; margin-bottom: 15px'>Welkom " . $_SESSION['user_name'] . "</p>";
        echo "<p> Gewicht: " . $gewicht . "</p><p> Lengte: " . $lengte . "</p><p> Leeftijd: " . $leeftijd . "</p><p>Roker: <b>" . $roken . "</b></p>" . "<p>Drugs gebruiker: <b>" . $drugs . "</b></p>";
    }
}







