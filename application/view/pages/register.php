<?php

require_once(ROOT . '/../application/controller/classes/registration.php');
require_once(ROOT . '/../application/config/connection.php');

$registration = new registration($db);
$registration->register();

?>
<?php
if(isset($_SESSION['registered']))
{?>
    <div class="alertsuccess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['registered'] ?>
    </div>
    <?php
    unset($_SESSION['registered']);
}
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
            <input class="" type="radio" name="gender" value="male" required> Man
            <input class="" type="radio" name="gender" value="female"> Vrouw
        </div>
        <div class="input-icon">
            <input class="input" type="number" name="height" placeholder="Lengte" required>
          <label class="icon-right">CM</label>
        </div>
        <div class="input-icon">
            <input class="input" type="number" name="weight" placeholder="Gewicht" required>
          <label class="icon-right">KG</label>
        </div>
        <div class="input-icon">
            <input class="input" type="date" name="geboortedatum" placeholder="Geboortedatum" required>
        </div>
        <h4>Beweging</h4>
        <select name="movement" class="input">
            <option value="" selected disabled hidden>Kies uit...</option>
            <option value="1.2">geen tot weinig lichaams beweging</option>
            <option value="1.375">lichte lichaamsbeweging</option>
            <option value="1.55">normale lichaamsbeweging</option>
            <option value="1.725">zware lichaamsbeweging</option>
            <option value="1.9">hele zware lichaamsbeweging</option>
        </select>
        <h4>Gebruikt u drugs?</h4>
        <select name="drugs" class="input">
            <option value="" selected disabled hidden>Kies uit...</option>
            <option value="1">Ja</option>
            <option value="0">Nee</option>
        </select>
        <h4>Rookt u?</h4>
        <select name="roker" class="input">
            <option value="" selected disabled hidden>Kies uit...</option>
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
