<?php
    require_once(ROOT . '/../application/controller/classes/user.php');
    require_once(ROOT . '/../application/config/connection.php');

    $user = new User($db);
    $user->login();
    $user->logedIn();  

?>

<div class="container-form">
    <h1 class="title">Gezondheidsmeter</h1>
    <form class="form login-form" action="" method="post">
        <div class="input-icon">
            <i class="fas fa-user-circle fa-lg icon"></i>
            <input class="input" type="text" name="email" placeholder="Email adres" class="login-inputs" required autofocus>
        </div>
        <div class="input-icon">
            <i class="fas fa-lock fa-lg icon"></i>
            <input class="input" type="password" name="password" class="login-inputs loginPasswordInput" placeholder="Wachtwoord" required><br>
            <i class="fas fa-eye fa-lg icon-right seePassword"></i>
        </div>
        <button type="submit" name="submit" class="button" >Login</button>
        <a class="link" href="/register">Geen account? Aanmelden</a>
    </form>
</div>
<script src="assets/js/script.js"></script>        
