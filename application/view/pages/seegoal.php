<?php
require_once(ROOT . '/../application/controller/classes/SeeGoals.php');
require_once(ROOT . '/../application/config/connection.php');
?>

<?php @include('../application/view/components/menu.php')?>

<div class="deleted">
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div> 
</div>
<div class="edited">
    <div class="alertsuccess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
</div>
   
<div class="container-form">
    <h1 class="title">Doelen</h1>
    <form class="form" method="post" id="seeGoalsForm">
        <!-- here comes the data -->
        <?php
            $goal = new SeeGoals($db);
            $goal->SeeGoal();
        ?>  
    </form>
</div>
<script src="assets/js/goals.js"></script>        
