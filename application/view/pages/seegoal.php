<?php
require_once(ROOT . '/../application/controller/classes/SeeGoals.php');
require_once(ROOT . '/../application/config/connection.php');

$goal = new SeeGoals($db);
$goal->SeeGoal();

// Fetch all for multiple
// FetchArray for single
$goal = $db->query("SELECT id, task, task_quantity FROM goals WHERE user_id = 2")->fetchAll();

?>
<div class="container-form">
    <h1 class="title">Doelen</h1>
    <form action="" class="form" action="/register" method="post">
            <?php
            foreach($goal as $row){
            echo '<div class="input-blocks">',
                    '<div class="input-icon"> ',
                        '<div class="title">'.$row["task"],
                        '</div>',
                    '</div>',
                    '<div class="input-icon">',
                        '<i class="far fa-clock icon"></i>',
                         '<div class="input">'.$row["task_quantity"],
                        '</div>',
                    '</div>',
                    '<div class="input-icon">',
                        '<i class="far fa-clock icon"></i>',
                        '<input class="input" type="text" name="goal" placeholder="Doel">',
                    '</div>',
                         '<button class="button" name="UpdateDoel" type="submit">Update doel</button>',
                        '<button class="button" name="DeleteDoel" type="submit">Verwijder doel</button>',
                '</div>';

            }
            ?>
        <button class="button" name="submit" type="submit">Terug</button>
    </form>
</div>