<?php
require_once(ROOT . '/../application/controller/classes/SeeGoals.php');
require_once(ROOT . '/../application/config/connection.php');

$goal = new SeeGoals($db);
$goal->SeeGoal();
?>

<div class="container-form">
    <h1 class="title">Doelen</h1>
    <form action="" class="form" action="/register" method="post">
        <!-- here comes the data -->
        <button class="button" name="submit" type="submit">Terug</button>
    </form>
</div>