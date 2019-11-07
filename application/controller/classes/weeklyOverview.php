<?php

class WeeklyOverview {
    private $weight;
    private $height;
    private $age;
    private $gender;
    private $movement;
    private $result;
    public $countGoals;

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
            FROM `user_drinks`
            INNER JOIN drinks
            ON user_drinks.drinken_id = drinks.ID
            WHERE user_ID = ?
            AND DATE(user_drinks.date) BETWEEN (NOW() - INTERVAL 7 DAY) AND NOW()', $_SESSION['user_id']) ->fetchAll();
        foreach ($drinks as $key) {
            @$totalKcal += $key['calorie'];
        }

        if(@$totalKcal <= 0 ){
            return "Je hebt nog niks gegeten of gedronken";
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

    function goalsAchieved(){
        $counter = 0;
        $goals = $this->db->query(
            'SELECT user_goals.task_quantity,user_goals.user_progress,goals.task
            FROM user_goals
            INNER JOIN goals
            ON user_goals.goals_id = goals.id
            WHERE user_ID = ?
            AND DATE(user_goals.date) BETWEEN (NOW() - INTERVAL 7 DAY) AND NOW()', $_SESSION['user_id']) ->fetchAll();

        foreach ($goals as $key) {
            if($key['task_quantity'] <= $key['user_progress'])
            {
                $counter++;
            }
        }
        $this->countGoals = count($goals);
        return $counter . '/' . $this->countGoals;
    }

    function scoreWerk(){
        $user = $_SESSION['user_id'];

        $score = $this->db->query('SELECT werktotalscore FROM user_werkscore 
        WHERE user_id = ?
        ORDER by date DESC LIMIT 1 ', $user)->fetchArray();

            $score['werktotalscore'] =  $score['werktotalscore'] ?? '';
            $checkscore = $score['werktotalscore'];
            if($checkscore > 8 ){
            return $_SESSION['addScoreWerk'] = "$score[werktotalscore]<br> ligt zo hoog u bent uiterst tevreden.";
            }elseif($checkscore > 5){
            return $_SESSION['addScoreWerk'] = "$score[werktotalscore]<br> boven het gemmidelde u heeft naar eigen zeggen een goede werkgever.";
            }elseif($checkscore > 3){
            return $_SESSION['addScoreWerk'] = "$score[werktotalscore]<br> ligt in een gevaarlijke zone laat dit weten en probeer een oplossing te vinden.";
            }elseif($checkscore > 1){
            return  $_SESSION['addScoreWerk'] = "$score[werktotalscore]<br> ligt in een positie waarbij u zo snel mogelijk contact moet opnemen om dit te verbeteren. ";
            }

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
    function alcoholUsage()
    {
        $user = $_SESSION['user_id'];
        $score = $this->db->query('SELECT alcohol_type_id, quantity FROM alcohol WHERE user_id = ?', $user)->fetchAll();

        $total = 0;
        foreach ($score as $key => $value)
        {
            if (is_array($value))
            {
                $total += $value['quantity'];
            }
        }
        //echo $total;

        if ($total >= 10)
        {
            $alcoholUsage = '<br> <p style="color: red">U heeft teveel alcohol gedronken! Pas op en stop met drinken voor deze week.</p>';
        } elseif ($total >= 5)
        {
            $alcoholUsage = '<br> <p style="color: #ff5b2e">U heeft aardig wat alcohol gedronken in deze week, neem niet teveel en ga zeker niet auto rijden!</p>';
        } elseif ($total >= 2)
        {
            $alcoholUsage = '<br> <p style="color: #cdc800">U heeft wat alcohol op in deze week. Doe voorzichtig. </p>';
        } elseif ($total <= 0)
        {
            $alcoholUsage = '<br> <p style="color: green">U heeft geen alcohol op in deze week. Goed bezig!</p>';
        }

        //$total is de totaal aan alcohol dat je hebt gedronken (quantity dus)
        return $alcoholUsage;
    }
}