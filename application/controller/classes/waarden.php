<?php

    class Waarden
    {

        protected $user_ID;
        public function __construct($db)
        {
            $this->db = $db;
        }

        public function insertValues()
        {
            if (isset($_POST['submit'])) {
                @$foodpost = @$_POST['voedsel'];
                @$drinkpost = @$_POST['drink'];
                @$weight = @$_POST['gewicht'];
                $user_id = $_SESSION['user_id'];
                @$food = $this->db->query("SELECT ID, name FROM food WHERE name = '$foodpost' ")->fetchAll();
                @$drink = $this->db->query("SELECT ID, name FROM drinks WHERE name = '$drinkpost'")->fetchAll();

                $timestamp = date('Y-m-d');
                if (@$food != NULL) {
                    $foodID = $food[0]['ID'];
                    $this->db->query('INSERT INTO user_food (user_ID, food_id, gram, date)
                    VALUES (?, ?, ?, ?)', $user_id, $foodID, 100, $timestamp);
                    $_SESSION['etenopslaan'] = 'Uw eten is opgeslagen!';
                }elseif(@$drink != NULL){
                    $drinkID = $drink[0]['ID'];
                    $this->db->query('INSERT INTO user_drinks (user_id, drinken_id, milliliters, date)
                    VALUES (?, ?, ?, ?)', $user_id, $drinkID, 100, $timestamp);
                    $_SESSION['drinkenopslaan'] = 'Uw drinken is opgeslagen!';
                }
                elseif (@$food == NULL && @$foodpost != NULL) {
                    $food = htmlspecialchars($_POST['voedsel']);
                    $protein = htmlspecialchars($_POST['eiwitten']);
                    $fat = htmlspecialchars($_POST['vetten']);
                    $sugars = htmlspecialchars($_POST['suikers']);
                    $salt = htmlspecialchars($_POST['zout']);
                    $this->db->query('INSERT INTO food (name, fat, sugar, salt, protein)
                                VALUES (?, ?, ?, ?, ?)', $food, $fat, $sugars, $salt, $protein);
                    $foodID = $this->db->query('SELECT ID FROM `food` ORDER BY ID DESC')->fetchAll();
                    $this->db->query('INSERT INTO user_food (user_ID, food_id, gram, date)
                                VALUES (?, ?, ?, ?)', $user_id, $foodID[0], 100, $timestamp);
                    $_SESSION['etenopslaan'] = 'Uw eten is opgeslagen!';
                }
                elseif (@$drink == NULL && @$drinkpost != NULL) {
                    $food = htmlspecialchars($_POST['drink']);
                    $protein = htmlspecialchars($_POST['eiwitten']);
                    $fat = htmlspecialchars($_POST['vetten']);
                    $sugars = htmlspecialchars($_POST['suikers']);
                    $salt = htmlspecialchars($_POST['zout']);
                    $this->db->query('INSERT INTO drinks (name, fat, sugar, protine)
                                VALUES (?, ?, ?, ?)', $food, $fat, $sugars, $protein);
                    $foodID = $this->db->query('SELECT ID FROM `drinks` ORDER BY ID DESC')->fetchAll();
                    $this->db->query('INSERT INTO user_drinks (user_id, drinken_id, milliliters, date)
                                VALUES (?, ?, ?, ?)', $user_id, $foodID[0], 100, $timestamp);
                    $_SESSION['drinkenopslaan'] = 'Uw drinken is opgeslagen!';
                }
                elseif (@$weight != NULL){
                    $timestamp = date('Y-m-d H:i:s');
                    $this->db->query('INSERT INTO weight (user_ID, weights, date)
                                VALUES (?, ?, ?)', $user_id, $weight, $timestamp);
                    $_SESSION['gewichtopslaan'] = 'Uw gewicht is opgeslagen!';
                }
            }
        }
    }
