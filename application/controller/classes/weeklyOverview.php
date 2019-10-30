<?php

class WeeklyOverview {
    private $weight;
    private $height;
    private $age;
    private $result;

    function __construct($db){
        $this->db = $db;
        $this->getDataUser();
        $this->getNutritionData();
        echo $this->bmrMen();
    }

    function getDataUser(){
        $this->weight = $this->db->query('SELECT weights FROM weight WHERE user_id = ?', $_SESSION['user_id']) ->fetchArray();
        $this->weight = implode('',$this->weight);

        $this->height = $this->db->query('SELECT height FROM user WHERE ID = ?', $_SESSION['user_id']) ->fetchArray();
        $this->height = implode('',$this->height);

        $this->age = $this->db->query('SELECT geboortedatum FROM user WHERE ID = ?', $_SESSION['user_id']) ->fetchArray();
        $age = implode('',$this->age);
        $this->age = date_diff(date_create($age), date_create('now'))->y;
    }
    function getNutritionData(){
        $nutrition = $this->db->query(
            'SELECT food.name, food.fat, food.sugar, food.salt, food.protein 
            FROM `user_food`
            INNER JOIN food
            ON user_food.food_id = food.ID
            WHERE user_ID = 13
            AND DATE(user_food.date) BETWEEN (NOW() - INTERVAL 7 DAY) AND NOW()') ->fetchAll();

            // var_dump($nutrition);
            foreach ($nutrition as $key) {
                @$totalKcal += $key['salt'];
            }
            echo 'gemiddelde aantal calorieën de laatste 7 dagen'.$totalKcal/7 . '<br>';
    }
    function bmrMen(){
        $x = 13.7516 * $this->weight;
        $r = 5.0033 * $this->height;
        $h = 6.7550 * $this->age;
        $bmr = 66.4730 + ($x) + ($r) - ($h);
        return $bmr;
        // geen tot weinig lichaams beweging * 1.2
        // lichte lichaamsbeweging * 1.375
        // normale lichaamsbeweging * 1.55
        // zware lichaamsbeweging * 1.725
        // hele zware lichaamsbeweging * 1.9
        // weight lose -500 kcal 
        // weight gain +500 kcal
    }
    function bmrWoman(){
        $x = 9.5634 * $this->weight;
        $r = 1.8496 * $this->height;
        $h = 4.6756 * $this->age;
        $bmr = 655.0955  + ($x) + ($r) - ($h);
        return $bmr;
    }
    function bmi(){
        // formule: gewicht / (lengte in meter * lengte in meter)
        $bmi = $this->weight / ($this->height/100 * $this->height/100);
        
        switch(true)
        {
            case($bmi < 18.5):
            $this->result = "Ondergewicht";
            break;

            case($bmi > 18.5 && $bmi < 25):
            $this->result = "Gezond gewicht";
            break;

            case($bmi > 25 && $bmi < 30):
            $this->result = "Overgewicht";
            break;

            case($bmi > 30):
            $this->result = "Ernstig overgewicht";
            break; 

            default: return;
        }
        echo 'bmi = ' .$this->result;
    }
}