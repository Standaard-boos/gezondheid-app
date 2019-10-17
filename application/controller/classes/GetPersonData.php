<?php

class GetPersonData
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    public  function GetData()
    {

        $user_info = $this->db->query('SELECT user.ID, user.username, user.email, user.geboortedatum, user.height, user.gender, weight.weights
                                FROM user INNER JOIN weight ON weight.ID WHERE user.email = ? AND weight.user_id = ? LIMIT 1', $_SESSION['user_email'], $_SESSION['user_id'])->fetchArray();

        // Get the age from the birtdate
        $age = $this->db->query('SELECT year(now()) - year(geboortedatum) AS geboortedatum FROM user WHERE user.id = ?', $_SESSION['user_id']) ->fetchArray();     

        $this->db;
        $username = $_SESSION['user_name'];
        $gewicht = $user_info['weights'] . " KG";
        $lengte = $_SESSION['height'] . " M";
        $leeftijd = $age['geboortedatum'] . " jaar"; 
        $roken = "nee";

        echo "<p>Username: " . $username . "</p><p> Gewicht: " . $gewicht . "</p><p> Lengte: " . $lengte . "</p><p> Leeftijd: " . $leeftijd . "</p><p>Roker: " . $roken . "</p>";
    }

}







