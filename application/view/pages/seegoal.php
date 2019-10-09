<?php
require_once(ROOT . '/../application/controller/classes/SeeGoals.php');
require_once(ROOT . '/../application/config/connection.php');
?>

<div class="container-form">
    <h1 class="title">Doelen</h1>
    <form action="" class="form" action="/register" method="post">
        <!-- here comes the data -->
            <?php
                $goal = new SeeGoals($db);
                $goal->SeeGoal();
            ?>
            <div class="input-icon">
                <div class="title" id="NoGoals"></div>
            </div>
            <a href="../dash" class="button">Terug</a>
    </form>
</div>