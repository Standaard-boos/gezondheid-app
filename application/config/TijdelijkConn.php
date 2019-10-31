<?php


    class TijdelijkConn
    {
        function connection(){
            $dbhost = '157.245.71.54';
            $dbuser = 'team13';
            $dbpass = '1eFH7sWP2Bg0PnnO!';
            $dbname = 'team 13';;

            // Create connection
            $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }else{
                return $conn;
            }

        }

    }