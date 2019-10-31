<?php

require_once(ROOT . '/../application/controller/classes/registration.php');
require_once(ROOT . '/../application/config/connection.php');

$registration = new registration($db);
$registration->register();

?>
<div class="container-form">
    <h1 class="title">Persoon Registeren</h1>
    <form class="form go-right" action="/register" method="post">
    <form class="form go-right" action="/register" method="post">
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
            <input class="" type="radio" name="gender" value="male" required> Male
            <input class="" type="radio" name="gender" value="female"> Female
        </div>
        <div class="input-icon">
            <input class="input" type="number" name="height" placeholder="Lengte" required>
            <label class="label_waarde">CM</label>
            <label class="label_waarde">CM</label>
        </div>
        <div class="input-icon">
            <input class="input" type="number" name="weight" placeholder="Gewicht" required>
            <label class="label_waarde">KG</label>
            <label class="label_waarde">KG</label>
        </div>
        <div class="input-icon">
            <input class="input" type="date" name="geboortedatum" placeholder="Geboortedatum" required>
        </div>
        <h4>Gebruikt u drugs?</h4>
        <select name="drugs">
            <option value="1">Ja</option>
            <option value="0">Nee</option>
        </select>
        <h4>Rookt u?</h4>
        <select name="roker">
            <option value="1">Ja</option>
            <option value="0">Nee</option>
        </select>
        <br>
        <button class="button" id="register_check" name="submit" type="submit">Registreer</button>
        <br>
        <br>
        <div class="input-icon">
            <a href="../" class="button">Terug</a>
        </div>
    </form>
</div>

<script src="assets/js/script.js"></script>        
<script src="assets/js/form.js"></script>
