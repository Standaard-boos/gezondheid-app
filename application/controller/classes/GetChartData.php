<?php

    require_once(ROOT . '/../application/config/TijdelijkConn.php');

class GetChartData{

    function Data(){
        $gewicht = 0;
        $gebruiker_ID = $_SESSION['user_id'];
        //$username = $_SESSION['user_name'];
        $array = null;


        $connect = new TijdelijkConn();
        $conn = $connect->connection();
        $sql = "SELECT weights FROM weight WHERE user_id = ?  ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$gebruiker_ID);
        $stmt->execute();
        $stmt->bind_result($gewicht);

        /* fetch values */
        $i = 0;
        while ($stmt->fetch()) {
            $array[$i] = array($gewicht);
            $i++;
        }

            return $array;

    }

}


?>