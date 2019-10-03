<?php

class GetPersonData{

    static function GetData(){

        $username = "Hulk Hogan";
        $gewicht = 120 . "KG";
        $lengte = 188 . "CM";
        $leeftijd = 99 . "jaar";
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







