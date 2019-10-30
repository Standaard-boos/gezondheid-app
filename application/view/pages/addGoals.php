<?php
    require_once(ROOT . '/../application/controller/classes/addGoals.php');
    require_once(ROOT . '/../application/config/connection.php');

    $goal = new AddGoals($db);
    $goal->addGoal();

?>
<?php @include('../application/view/components/menu.php')?>
<?php
if(isset($_SESSION['addgoalsuccess']))
{?>
    <div class="alertsuccess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['addgoalsuccess'] ?>
    </div>
    <?php
    unset($_SESSION['addgoalsuccess']);
}
?>
<div class="container-add-goal">
    <div class="container-header">
        <a href="/dash"><i class="fas fa-arrow-left fa-2x" id="goBackArrow"></i> &nbsp</a>
        <h1 class="title">Doelen invoeren</h1>
    </div>
    <form action="/addgoal" method="post" class="form">
        <div class="form-group">
            <h4>Doel</h4>
            <input type="text" name="task" class="input" placeholder="Rennen.." required autofocus>
            <h4 class="input-icon">In welke waarden ?</h4>
        <div class="input-icon">
            <select class="input" name="goal_quantity" id="goal_quantity" required>
                <option value="Keer">Keer</option>         
                <option value="KM">KM</option> 
                <option value="M">M</option> 
                <option value="sets van 5">Set van 5</option> 
                <option value="sets van 10">Set van 10</option> 
            </select>
        </div>
        </div>
         <div class="form-group">
            <h4>Hoeveel</h4>
            <input type="number" name="task_quantity" class="input" placeholder="0" required>
        </div>
        <button type="submit" name="submit" class="button sendBtn" >Verstuur</button>
        <a href="/seegoal" class="button backBtn">Terug</a>
    </form>
</div>
<script src="assets/js/addgoal.js"></script>    