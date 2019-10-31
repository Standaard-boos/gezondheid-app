<?php
require_once(ROOT . '/../application/controller/classes/waarden.php');
require_once(ROOT . '/../application/config/connection.php');

$insertValues = new waarden($db);
$insertValues->insertValues();
?>
<?php @include('../application/view/components/menu.php')?>
<?php
if(isset($_SESSION['etenopslaan']))
{?>
    <div class="alertsuccess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['etenopslaan'] ?>
    </div>
    <?php
    unset($_SESSION['etenopslaan']);
}
?>
<?php
if(isset($_SESSION['drinkenopslaan']))
{?>
    <div class="alertsuccess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['drinkenopslaan'] ?>
    </div>
    <?php
    unset($_SESSION['drinkenopslaan']);
}
?>
<?php
if(isset($_SESSION['gewichtopslaan']))
{?>
    <div class="alertsuccess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['gewichtopslaan'] ?>
    </div>
    <?php
    unset($_SESSION['gewichtopslaan']);
}
?>
<div class="container-form">
    <h1 class="title">Gegevens invoegen</h1>
    <form class="form" action="/waarden" method="post">
        <div class="input-icon">
            <input class="input" id="voedsel" type="text" name="voedsel" placeholder="Eten">
            <i class="fas fa-utensils fa-lg icon"></i>
        </div>
        <div class="input-icon">
            <input class="input" id="drink" type="text" name="drink" placeholder="Drinken">
            <i class="fas fa-utensils fa-lg icon"></i>
        </div>
        <h2 class="sub-title">Waardes in grammen en ml</h2>
        <!-- <input class="input" id="koolydraten" type="text" name="koolhydraten" placeholder="Koolydraten"> -->
        <input class="input" id="calorie" type="text" name="calorie" placeholder="calorieën">
        <input class="input" id="eiwitten" type="text" name="eiwitten" placeholder="Eiwitten">
        <input class="input" id="vetten" type="text" name="vetten" placeholder="Vetten ">
        <input class="input" id="suikers" type="text" name="suikers" placeholder="Suikers">
        <input class="input" id="zout" type="text" name="zout" placeholder="Zout">
        <button class="button" id="submit_gegevens" name="submit" type="submit">Gegevens toevoegen</button>
    </form>
</div>
<div class="container-form">
    <form class="form"  action="/waarden" method="post">
        <h2 class="sub-title" style="margin-bottom: 20px">Gewicht vandaag?</h2>
        <input class="input" id="gewicht" type="number" name="gewicht" placeholder="Gewicht">
        <button class="button" id="submit_gegevens" name="submit" type="submit">Gegevens toevoegen</button>
    </form>
</div>

<script src="assets/js/waarden.js"></script>        

