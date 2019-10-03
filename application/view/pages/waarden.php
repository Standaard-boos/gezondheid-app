<?php
require_once(ROOT . '/../application/controller/classes/waarden.php');
require_once(ROOT . '/../application/config/connection.php');

$insertValues = new insertWaardes($db);
$insertValues->insertValues();
?>
<div class="container-form">
    <h1 class="title">Gegevens invoegen</h1>
    <form class="form" action="/waarden" method="post">
        <div>
            <input class="input" id="voedsel" type="text" name="voedsel" placeholder="Eten of drinken">
            <i class="icon-right fas fa-utensils"></i>
        </div>
        <div>
            <h2>Waardes in grammen</h2>
            <input class="input" id="calorieen" type="text" name="calorieen" placeholder="Calorieen">
            <input class="input" id="koolydraten" type="text" name="koolhydraten" placeholder="Koolydraten">
            <input class="input" id="eiwitten" type="text" name="eiwitten" placeholder="Eiwitten">
        </div>
        <div class="waarden-flex">
            <input class="inputs" id="vetten" type="text" name="vetten" placeholder="Vetten ">
            <input class="input" id="suikers" type="text" name="suikers" placeholder="Suikers">
            <input class="input" id="zout" type="text" name="zout" placeholder="Zout">
        </div>
        <button class="button" id="submit_gegevens" name="submit" type="submit">Gegevens toevoegen</button>
    </form>
</div>


