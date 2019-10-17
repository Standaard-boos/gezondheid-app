<?php

    class insertWaardes
    {

        protected $user_ID;
        public function __construct($db)
        {
            $this->db = $db;
        }

        public function insertValues()
        {
            if (isset($_POST['submit']))
            {
                $user_id = $_SESSION['user_id'];
                $food = htmlspecialchars($_POST['voedsel']);
                $calories = htmlspecialchars($_POST['calorieen']);
                $carbohydrates = htmlspecialchars($_POST['koolhydraten']);
                $protein = htmlspecialchars($_POST['eiwitten']);
                $fat = htmlspecialchars($_POST['vetten']);
                $sugars = htmlspecialchars($_POST['suikers']);
                $salt = htmlspecialchars($_POST['zout']);

                $error = 0;

                if ($error === 0)
                {
                    $this->db->query('INSERT INTO food (user_ID, name_food, kcal, fat, salt, sugar, protein, carbohydrates)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)', $user_id, $food, $calories, $fat, $salt, $sugars, $protein, $carbohydrates);
                }
            }
        }
    }
