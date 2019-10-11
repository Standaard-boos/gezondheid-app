<?php

class GetPersonData{

    static function GetData(){

        $username = $_SESSION['user_name'];
        $gewicht = $_SESSION['user_weight'] . " KG";
        $lengte = $_SESSION['height'] . " CM";
        $leeftijd = $_SESSION['user_age'] . " jaar";
        $roken = "nee";

        echo "<p>Username: ". $username."</p><p> Gewicht: ".$gewicht."</p><p> Lengte: ". $lengte."</p><p> Leeftijd: ".$leeftijd."</p><p>Roker: ".$roken."</p>";  
        
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







