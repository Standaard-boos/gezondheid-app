<?php
require_once(ROOT . '/../application/controller/classes/sleep.php');
require_once(ROOT . '/../application/config/connection.php');

$class = new Sleep($db);
?>

<?php @include('../application/view/components/menu.php')?>

<?php if(isset($_SESSION['success'])){?>
 <div class="alertsuccess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['success']; ?>
        <?php unset($_SESSION['success']) ?>
    </div>
<?php }else if(isset($_SESSION['failed'])){?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['failed']; ?>
        <?php unset($_SESSION['failed']) ?>
    </div>
<?php }?>

<div class="container-form">
    <h1 class="title">Slaap invoeren</h1>
    <form class="form" action="/sleep" method="post">  
        <h2 class="sub-title">Hoeveel uur heeft u geslapen?</h2>
        <div class="input-icon">
            <input class="input" type="number" name="sleep" min="0" max="24" required autofucs>
          <label class="icon-right">uur</label>
        </div>
        <div class="input-icon">
            <input class="input" type="date" name="sleep_date" max="<?php echo date('Y-m-d') ?>"placeholder="Datum" required>
            <small>Wil je slaapuren van een ingevulde datum wijzigen dan kunt opnieuw data invullen en het wordt vanzelf gewijzigd</small>
        </div>
        <br>
        <button class="button" id="register_check" name="submit" type="submit">Verzenden</button>
        <br>
        <br>
        <a href="../" class="button">Terug</a>
    </form>
</div>