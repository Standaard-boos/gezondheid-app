<?php

class GetPersonData
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    public  function GetData()
    {

        $user_info = $this->db->query('SELECT user.ID, user.username, user.email, user.age, user.height, user.gender, weight.weights
                                FROM user INNER JOIN weight ON weight.ID WHERE user.email = ? AND weight.user_id = ? LIMIT 1', $_SESSION['user_email'], $_SESSION['user_id'])->fetchArray();

        $this->db;
        $username = $_SESSION['user_name'];
        $gewicht = $_SESSION['user_weight'] . " KG";
        $lengte = $_SESSION['height'] . " M";
        $leeftijd = $_SESSION['user_age'] . " jaar";
        $roken = "nee";

        echo "<p>Username: " . $username . "</p><p> Gewicht: " . $gewicht . "</p><p> Lengte: " . $lengte . "</p><p> Leeftijd: " . $leeftijd . "</p><p>Roker: " . $roken . "</p>";

        //$sql = "SELECT id, firstname, lastname FROM MyGuests";
        //$result = $conn->query($sql);


        // if ($result->num_rows > 0) {
        //     // output data of each row
        //     while ($row = $result->fetch_assoc()) {
        //         echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
        //     }
        // } else {
        //     echo "0 results";
        // }

    }

}







