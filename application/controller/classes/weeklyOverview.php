<?php

class WeeklyOverview {
    private $weight;
    private $height;
    private $age;
    private $gender;
    private $movement;
    private $result;

    function __construct($db){
        $this->db = $db;
        $this->getDataUser();
    }

    function getDataUser(){
        $this->weight = $this->db->query('SELECT weights FROM weight WHERE user_id = ?', $_SESSION['user_id']) ->fetchArray();
        $this->weight = implode('',$this->weight);

        $user = $this->db->query('SELECT height,gender,geboortedatum,movement FROM user WHERE ID = ?', $_SESSION['user_id']) ->fetchArray();
        $this->gender =  $user['gender'];
        $this->height = $user['height'];
        $this->movement = $user['movement'];
        $this->age = date_diff(date_create($user['geboortedatum']), date_create('now'))->y;
       
    }
    function getNutritionData(){
        $nutrition = $this->db->query(
            'SELECT food.name, food.fat, food.sugar, food.calorie, food.protein 
            FROM `user_food`
            INNER JOIN food
            ON user_food.food_id = food.ID
            WHERE user_ID = ?
            AND DATE(user_food.date) BETWEEN (NOW() - INTERVAL 7 DAY) AND NOW()', $_SESSION['user_id']) ->fetchAll();

        foreach ($nutrition as $key) {
            @$totalKcal += $key['calorie'];
        }

        $drinks = $this->db->query(
            'SELECT drinks.name, drinks.fat, drinks.sugar, drinks.calorie, drinks.protine 
            FROM `user_food`
            INNER JOIN drinks
            ON user_food.food_id = drinks.ID
            WHERE user_ID = ?
            AND DATE(user_food.date) BETWEEN (NOW() - INTERVAL 7 DAY) AND NOW()', $_SESSION['user_id']) ->fetchAll();
        foreach ($drinks as $key) {
            @$totalKcal += $key['calorie'];
        }
        if(@$totalKcal <= 0 ){
            return ": Je hebt nog niks gegeten of gedronken";
        }else{
            return number_format((float)$totalKcal/7, 2, '.', '');
        }
    }
    function bmr(){
        if ($this->gender == 'male') {
            $x = 13.7516 * $this->weight;
            $r = 5.0033 * $this->height;
            $h = 6.7550 * $this->age;
            $bmr = 66.4730 + ($x) + ($r) - ($h);
            return number_format((float)$bmr  * $this->movement,2, '.', '');
        }elseif ($this->gender == 'female') {
            $x = 9.5634 * $this->weight;
            $r = 1.8496 * $this->height;
            $h = 4.6756 * $this->age;
            $bmr = 655.0955  + ($x) + ($r) - ($h);
            return number_format((float)$bmr * $this->movement,2, '.', ''); 
        }else{
            return;
        }
     
        // weight lose -500 kcal 
        // weight gain +500 kcal
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
            $this->result = "Zwaar overgewicht";
            break; 

            default: return;
        }
        return $this->result;
    }
}