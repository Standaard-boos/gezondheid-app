<?php

require_once(ROOT . '/../application/controller/classes/registration.php');
require_once(ROOT . '/../application/config/connection.php');

$registration = new registration($db);
$registration->register();

?>
<div class="container-form">
    <h1 class="title">Persoon Registeren</h1>
    <form class="form" action="/register" method="post">
        <div class="input-icon">
            <i class="fas fa-user-circle icon"></i>
            <input type="text" name="name" placeholder="Gebruiksnaam" class="input" required autofocus>
        </div>
        <div class="input-icon">
            <input class="input" type="text" name="email" placeholder="Email" required>
        </div><br>
        <div class="input-icon">
            <i class="fas fa-lock icon"></i>
            <input  type="password" name="password" class="input loginPasswordInput" placeholder="Wachtwoord" required><br>
            <i class="fas fa-eye icon-right seePassword"></i>
        </div>
        <div class="input-icon">
            <i class="fas fa-lock icon"></i>
            <input type="password" name="verifyPassword" class="input" placeholder="Herhaal wachtwoord" required><br>
        </div>
        <div class="input-icon">
            <label>Geslacht</label>
        </div>
        <div class="input-icon">
            <input class="" type="radio" name="gender" value="male"> Male
            <input class="" type="radio" name="gender" value="female"> Female
        </div>
        <div class="input-icon">
            <input class="input" type="text" name="height" placeholder="Lengte" required>
            <label class="label_waarde">CM</label>
        </div>
        <div class="input-icon">
            <input class="input" type="text" name="weight" placeholder="Gewicht" required>
            <label class="label_waarde">KG</label>
        </div>
        <div class="input-icon">
            <input class="input" type="date" name="geboortedatum" placeholder="Geboortedatum" required>
        </div>
        <button class="button" name="submit" type="submit">Registreer</button>
    </form>
</div>

<script src="assets/js/script.js"></script>        
