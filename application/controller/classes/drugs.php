<?php

class Drugs{
    
    public function __construct($db){
        $this->db = $db;
    }

    public function addDrugs(){
        if (empty($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
        }
        $token = $_SESSION['token'];
        
        if (!empty($_POST['token'])) {
            if (hash_equals($_SESSION['token'], $_POST['token'])) {
                if(isset($_POST['submit'])){
                    $drug_type = $this->db->connection->real_escape_string($_POST['drug_types']) ?? 'not defined';
                    $quantity = $this->db->connection->real_escape_string($_POST['quantity']) ?? 'not defined';
                    $input_quantity = $this->db->connection->real_escape_string($_POST['input_quantity']) ?? 'not defined';
                    $timestamp = date('Y-m-d H:i:s');
                    $_SESSION['addeddrugs'] = 'Uw drugs data is opgeslagen!';

                    switch (true) {
                        case($_POST['drug_types'] == 'Speed'):
                            $points = 5;
                            $drugtype = 1;
                            break;

                        case($_POST['drug_types'] == 'Cocaine'):
                            $points = 7;
                            $drugtype = 2;
                            break;

                        case($_POST['drug_types'] == 'GHB'):
                            $points = 2;
                            $drugtype = 3;
                            break;

                        case($_POST['drug_types'] == 'Cannabis'):
                            $points = 3;
                            $drugtype = 4;
                            break;

                        case($_POST['drug_types'] == 'Heroine'):
                            $points = 10;
                            $drugtype = 5;
                            break;

                        case($_POST['drug_types'] == 'LSD'):
                            $points = 1;
                            $drugtype = 6;
                            break;

                        case($_POST['drug_types'] == 'Methadon'):
                            $points = 2;
                            $drugtype = 7;
                            break;

                        case($_POST['drug_types'] == 'Paddo'):
                            $points = 4;
                            $drugtype = 8;
                            break;

                        case($_POST['drug_types'] == 'XTC'):
                            $points = 3;
                            $drugtype = 9;
                            break;

                        case($_POST['drug_types'] == 'Ketamine'):
                            $points = 5;
                            $drugtype = 10;
                            break;

                        default:
                            return "Geen data gevonden";
                    }

                    if(!EMPTY($_POST['input_quantity'])){
                        $newPoints = $points * $_POST['input_quantity'];
                    }
                    else{
                        $newPoints = $points * $_POST['quantity'];
                    }

                    if (empty($input_quantity)) {
                        $this->db->query('INSERT INTO drugs (user_id,drugs_type_id,quantity,drugspoints,created_at)
                        VALUES (?,?,?,?,?)',$_SESSION['user_id'],$drugtype, $quantity, $newPoints, $timestamp);
                    }else{
                        $this->db->query('INSERT INTO drugs (user_id,drugs_type_id,quantity,drugspoints)
                        VALUES (?,?,?,?)',$_SESSION['user_id'],$drugtype, $input_quantity, $newPoints);
                    }
                }
            }
        }   
    }
}