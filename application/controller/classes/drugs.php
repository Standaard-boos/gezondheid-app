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

                    if (empty($input_quantity)) {
                        $this->db->query('INSERT INTO drugs (user_id,drugs_type_id,quantity,created_at)
                        VALUES (?,?,?,?)',$_SESSION['user_id'],$drug_type, $quantity, $timestamp);
                    }else{
                        $this->db->query('INSERT INTO drugs (user_id,drugs_type_id,quantity)
                        VALUES (?,?,?)',$_SESSION['user_id'],$drug_type, $input_quantity);
                    }
                }
            }

        }
    }

    public function calculateDrugs()
    {
        $drugscore = $this->db->query('SELECT drugspoints FROM drugs WHERE user_id = ?', $_SESSION['user_id'])->fetchAll();

        foreach ($drugscore as $drug) {
            $newDrugscore[] = array_sum($drug);
            $newscore = array_sum($newDrugscore);
        }

        $score = 10;

        switch (true) {
            case($newscore >= 10):
                $score = 1;
                break;
            case($newscore == 9):
                $score = 1;
                break;
            case($newscore == 8):
                $score = 2;
                break;
            case($newscore == 7):
                $score = 3;
                break;
            case($newscore == 6):
                $score = 4;
                break;
            case($newscore == 5):
                $score = 5;
                break;
            case($newscore == 4):
                $score = 6;
                break;
            case($newscore == 3):
                $score = 7;
                break;
            case($newscore == 2):
                $score = 8;
                break;
            case($newscore == 1):
                $score = 9;
                break;
        }

        return $score;

    }
}