<?php
    require_once(ROOT . '/../application/controller/classes/user.php');
    require_once(ROOT . '/../application/config/connection.php');

    $user = new user($db);
    
    if(isset($_POST['submit'])){
        $user->login();
    }
    $user->logedIn();  

?>
<div class="container-login">
    <div class="login-header">
        <h1>Gezondheidsmeter</h1>
    </div>
    <form class="login-form" action="login" method="post">
        <div class="login-flex">
            <i class="fas fa-user-circle icons-input-left"></i>
            <input type="text" name="email" placeholder="Email adres" class="login-inputs" required autofocus>
        </div>
        <div class="login-flex">
            <i class="fas fa-lock icons-input-left"></i>
            <input type="password" name="password" id="loginPasswordInput" class="login-inputs" placeholder="Wachtwoord" required><br>
            <i class="fas fa-eye icons-input-right" id="seePassword"></i>
        </div>
        <div class="login-form-buttons">
            <button type="submit" name="submit" class="login-form-submit" >Login</button><br><br>
            <a href="">Geen account?<br>Aanmelden</a>
        </div>
    </form>

</div>
