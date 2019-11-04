<?php

class Scores
{

    protected $user_id;
    public function __construct($db)
    {
        $this->db = $db;

        if(!isset($_SESSION['loggedin'])){
            header("Location:/");
        }
    }   

    public function seeScore(){

        // Calculating the score of your work

                if(isset($_POST['submit'])){
                    $user = $_SESSION['user_id'];

                    $chairscore = $_POST['chaircomfort'];
                    $tafelscore = $_POST['tablecomfort'];
                    $screenscore = $_POST['screencomfort'];
                    $breaksscore = $_POST['breaks'];
                    

                    $stresscore = $_POST['stresslevel'];
                    $timestamp = date('Y-m-d H:i:s');

                    $werkscoretotal = (($chairscore + $tafelscore + $screenscore + $breaksscore) - $stresscore) / 4;

                    if($werkscoretotal != null){
                    $this->db->query('INSERT INTO user_werkscore (user_id, werktotalscore ,date)
                    VALUES (?, ?, ?)', $user, $werkscoretotal, $timestamp);
                    }

                    $score = $this->db->query('SELECT werktotalscore FROM user_werkscore 
                    WHERE user_id = ?
                    ORDER by date DESC LIMIT 1 ', $user)->fetchArray();

                    $checkscore = $score['werktotalscore'];
                    if($checkscore > 8 ){
                        $_SESSION['addScoreWerk'] = "Uw score voor uw werk  $score[werktotalscore]<br> ligt zo hoog u bent uiterst tevreden.";
                    }elseif($checkscore > 5){
                    $_SESSION['addScoreWerk'] = "Uw werk score ligt op $score[werktotalscore]<br> boven het gemmidelde u heeft naar eigen zeggen een goede werkgever.";
                    }elseif($checkscore > 3){
                        $_SESSION['addScoreWerk'] = "Uw score voor uw werk  $score[werktotalscore]<br> ligt in een gevaarlijke zone laat dit weten en probeer een oplossing te vinden.";
                    }elseif($checkscore > 1){
                        $_SESSION['addScoreWerk'] = "Uw score voor uw werk  $score[werktotalscore]<br> ligt in een positie waarbij u zo snel mogelijk contact moet opnemen om dit te verbeteren. ";
                    }
                    
        
                }
        }
}
      
