<?php

?>
<div class="container-form">
    <h1 class="title">Gegevens invoegen</h1>
        <form class="waarden-form" action="/waarden" method="post">
            <div class="waarden-flex">
                <input class="waarden-inputs" id="voedsel" type="text" name="voedsel" placeholder="Eten of drinken">
                <i class="icon-right fas fa-utensils"></i>
            </div>
            <div class="waarden-flex">
                <h2>Waardes in grammen</h2>
                <input class="waarden-inputs" id="calorieen" type="text" name="calorieen" placeholder="Calorieen">
                <input class="waarden-inputs" id="koolydraten" type="text" name="Koolydraten" placeholder="Koolydraten">
                <input class="waarden-inputs" id="eiwitten" type="text" name="Eiwitten" placeholder="Eiwitten">
            </div>
            <div class="waarden-flex">
                <input class="waarden-inputs" id="vetten" type="text" name="Vetten" placeholder="Vetten ">
                <input class="waarden-inputs" id="suikers" type="text" name="Suikers" placeholder="Suikers">
                <input class="waarden-inputs" id="zout" type="text" name="Zout" placeholder="Zout">
            </div>
                <button class="button" id="submit_gegevens" name="submit" type="submit">Gegevens toevoegen</button>
            </div>
        </form>
</div>


