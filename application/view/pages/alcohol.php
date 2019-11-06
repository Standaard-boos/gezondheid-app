<?php @include('../application/view/components/menu.php') ?>
<?php
require_once(ROOT . '/../application/config/connection.php');
require_once(ROOT . '/../application/controller/classes/alcohol.php');

$drug = new alcohol($db);
$drug->addAlcohol();
?>
<?php
if (isset($_SESSION['addedAlcohol']))
{
    ?>
    <div class="alertsuccess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['addedAlcohol'] ?>
    </div>
    <?php
    unset($_SESSION['addedAlcohol']);
}
?>

<?php
if (isset($_SESSION['errorAlcohol']))
{
    ?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['errorAlcohol'] ?>
    </div>
    <?php
    unset($_SESSION['errorAlcohol']);
}
?>
<div class="container-form">
    <h1 class="title">Alcohol gebruik toevoegen</h1>
    <form class="form" action="/alcohol" method="post">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>">
        <h4 class="input-icon">Kies een soort alcohol uit</h4>
        <div class="input-icon">
            <select class="input" name="alcohol_types" required>
                <option value="">Kies uit...</option>
                <option value="1">Bier</option>
                <option value="2">Wijn</option>
                <option value="3">Vodka</option>
                <option value="4">Whiskey</option>
                <option value="5">Jenever</option>
            </select>
        </div>

        <h4 class="input-icon">Hoeveel heeft u aan alcohol gebruikt? (Glazen/shots)</h4>
        <div class="input-icon">
            <input class="input" type="number" name="used_alcohol" placeholder="Aantal shots/glazen" required>
        </div>
        <br>
        <button class="button" name="submit" type="submit">Toevoegen</button>
        <br>
        <br>
        <div class="input-icon">
            <a href="../" class="button">Terug</a>
        </div>
    </form>
</div>
