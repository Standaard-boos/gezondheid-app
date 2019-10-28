<?php
require_once(ROOT . '/../application/controller/classes/SeeGoals.php');
require_once(ROOT . '/../application/config/connection.php');
?>

<?php @include('../application/view/components/menu.php')?>
<?php
if(isset($_SESSION['goaldeleted']))
{?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['goaldeleted'] ?>
    </div>
    <?php
    unset($_SESSION['goaldeleted']);
}
?>
<?php
if(isset($_SESSION['goalupdated']))
{?>
    <div class="alertsuccess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['goalupdated'] ?>
    </div>
    <?php
    unset($_SESSION['goalupdated']);
}
?>
<div class="container-form">
    <h1 class="title">Doelen</h1>
    <form class="form" method="post" id="seeGoalsForm">
        <!-- here comes the data -->
        <div class="scroll">
            <?php
                $goal = new SeeGoals($db);
                $goal->SeeGoal();
            ?>  
        </div>
        <div class="input-icon">
        </div>
        <div class="input-icon">
            <a href="../addgoal" class="button">Voeg doel toe</a>
        </div>
        <br>
        <br>
        <div class="input-icon">
            <a href="../dash" class="button">Terug</a>
        </div>
    </form>
</div>
<script src="assets/js/goals.js"></script>        
