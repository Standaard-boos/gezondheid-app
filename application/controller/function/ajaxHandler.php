<?php

require_once(ROOT . '/../application/controller/classes/seeGoals.php');
require_once(ROOT . '/../application/config/connection.php');


$seeGoal = new SeeGoals($db);

if($_SERVER['REQUEST_URI'] == '/ajax'){
    $seeGoal->updateDoel();
    die();
}elseif ($_SERVER['REQUEST_URI'] == '/deleteGoal') {
   $seeGoal->deleteGoal();
   die();
}elseif ($_SERVER['REQUEST_URI'] == '/getGoals') {
   $seeGoal->SeeGoal();
   die();
}