<?php

require_once(ROOT . '/../application/controller/classes/registration.php');
require_once(ROOT . '/../application/config/connection.php');

$registration = new registration($db);
$registration->register();

?>
<div class="container-register">
    <div class="register-header">
        <h1>Persoon Registeren</h1>
    </div>
    <form class="register-form" action="/register" method="post">
        <div class="register-flex">
            <i class="fas fa-user-circle icons-input-left"></i>
            <input type="text" name="name" placeholder="Gebruiksnaam" class="register-inputs" required autofocus>
        </div>
        <div class="register-flex">
            <input class="register-inputs" type="text" name="email" placeholder="Email">
        </div><br>
        <div class="register-flex">
            <i class="fas fa-lock icons-input-left"></i>
            <input type="password" name="password" class="register-inputs" placeholder="Wachtwoord" required><br>
            <i class="fas fa-eye icons-input-right"></i>
        </div>
        <div class="register-flex">
            <i class="fas fa-lock icons-input-left"></i>
            <input type="password" name="verifyPassword" class="register-inputs" placeholder="Herhaal wachtwoord"
                   required><br>
        </div>
        <div class="register-flex">
            <label>Geslacht</label>
        </div>
        <div class="register-flex">
            <input class="register-inputs-gender" type="radio" name="gender" value="male"> Male
            <input class="register-inputs-gender" type="radio" name="gender" value="female"> Female
        </div>
        <div class="register-flex">
            <input class="register-inputs" type="text" name="height" placeholder="Hoogte">
        </div>
        <div class="register-flex">
            <input class="register-inputs" type="text" name="weight" placeholder="Gewicht">
        </div>
        <div class="register-flex">
            <input class="register-inputs" type="number" name="age" placeholder="leeftijd">
        </div>
        <div class="register-flex">
            <div class="register-form-buttons">
                <button class="register-form-submit" name="submit" type="submit">Registreer</button>
            </div>
        </div>
    </form>
</div>


