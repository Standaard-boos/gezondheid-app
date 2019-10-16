<?php
    require_once(ROOT . '/../application/controller/classes/addGoals.php');
    require_once(ROOT . '/../application/config/connection.php');

    $goal = new AddGoals($db);
    $goal->addGoal();

?>
<div class="container-add-goal">
    <div class="container-header">
        <a href="/dash"><i class="fas fa-arrow-left fa-2x" id="goBackArrow"></i> &nbsp</a>
        <h1 class="title">Doelen invoeren</h1>
    </div>
    <form action="/addgoal" method="post" class="form">
        <div class="form-group">
            <label>Taak</label>
            <input type="text" name="task" class="input" placeholder="Rennen.." required autofocus>
        </div>
         <div class="form-group">
            <label>Hoeveel</label>
            <input type="number" name="task_quantity" class="input" placeholder="0" required>
        </div>
        <button type="submit" name="submit" class="button sendBtn" >Verstuur</button>
        <a href="/dash" class="button backBtn">Terug</a>
    </form>

</div>