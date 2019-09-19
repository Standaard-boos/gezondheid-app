<?php
require_once(ROOT . '/../application/controller/classes/FirstClass.php');
$_SESSION['username'] = "World strongest man!";
$_SESSION['valid'] = true;


if(isset($_SESSION['valid'])){





?>




<div class="dashboardContainer">
    <h2>Overzicht</h2>
    <h3 class="">Welkom : <?php echo $_SESSION['username']; ?></h3>
    <div  class="">
        <button class="button">Invoer Gegevens</button>
        <button class="button">Doelen</button>
    </div>
</div>
<?php }?>