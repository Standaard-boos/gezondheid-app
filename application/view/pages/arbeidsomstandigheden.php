<?php
    require_once(ROOT . '/../application/controller/classes/addScoreWerk.php');
    require_once(ROOT . '/../application/config/connection.php');


    $seeScore = new Scores($db);
    $seeScore->seeScore();  
?>
<?php @include('../application/view/components/menu.php')?>
<?php
if(isset($_SESSION['addScoreWerk']))
{?>
    <div class="alertsuccess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['addScoreWerk'] ?>
    </div>
    <?php
    unset($_SESSION['addScoreWerk']);
}
?>
<div class="container-form">
    <h1 class="title">Arbeidsomstandigheden toevoegen op basis van 1/10</h1>
    <form class="form" action="/arbeidsomstandigheden" method="post">
        <div class="input-icon">
            <input class="input" id="chaircomfort" type="number" value="" name="chaircomfort" min="1" max="10" placeholder="Stoelcomfort" required>
        </div>
        <div class="input-icon">
            <input class="input" id="tablecomfort" type="number" value="" name="tablecomfort" min="1" max="10" placeholder="Tafelcomfort" required>            
        </div>
        <div class="input-icon">
            <input class="input" id="screencomfort" type="number" value="" name="screencomfort" min="1" max="10" placeholder="Beelschermcomfort" required>            
        </div>
        <div class="input-icon">
            <input class="input" id="breaks" type="number" value="" name="breaks" min="1" max="10" placeholder="Tevreden over het aantal pauzes" required>            
        </div>
        <div class="input-icon">
            <input class="input" id="stresslevel" type="number" value="" name="stresslevel" min="1" max="10" placeholder="Werkdruk op het werk" required>            
        </div>
        <button class="button" id="submit_comfort" name="submit" onclick="" type="submit">Arbeidsomstandigheden meten</button>
    </form>
</div>

<script src="assets/js/scorewerk.js"></script>        

