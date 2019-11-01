<?php
    require_once(ROOT . '/../application/controller/classes/addGoals.php');
    require_once(ROOT . '/../application/config/connection.php');

    $goal = new AddGoals($db);
    $goal->addGoal();

    $user = $db->query('SELECT * FROM goals')->fetchAll();
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
            <label>Taak</label>
            <br>
            <select class="input" name="task">
            <?php foreach($user as $taak){?>
                <option value="<?php echo $taak['id'] ?>"><?php echo $taak['task'] ?>  (<?php echo $taak['sets'] ?>)</option>;
            <?php  }?>
            </select>
<!--            <input type="text" name="task" class="input" placeholder="Rennen.." required autofocus>-->
        </div>
        <div class="form-group">
            <label>Hoeveel</label>
            <input type="number" name="task_quantity" class="input" placeholder="0" required>
        </div>
        <button type="submit" name="submit" class="button sendBtn" >Verstuur</button>
        <a href="/seegoal" class="button backBtn">Terug</a>
    </form>

</div>