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
                    $drug_type = $_POST['drug_types'];
                    $quantity = $_POST['quantity'];

                    $this->db->query('INSERT INTO drugs (user_id,drugs_type_id,quantity)
                    VALUES (?,?,?)',$_SESSION['user_id'], $_POST['drug_types'], $_POST['quantity']);
            
                }
            }
        }
    
       
    }
}