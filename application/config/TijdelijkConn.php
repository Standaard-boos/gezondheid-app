<?php


    class TijdelijkConn
    {
        function connection(){
            $servername = "phpmyadmin.marojeri.nl";
            $username = "team_13";
            $password = "vG7nL2Wo18dslfNk";
            $database = "team_13";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }else{
                return $conn;
            }

        }

    }