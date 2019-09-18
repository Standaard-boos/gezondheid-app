<div class="container-login">
<div class="login-header">
    <h1>Persoon Registeren</h1>
</div>
    <div>
        <form class="login-form">
            <div class="login-flex">
                <i class="fas fa-user-circle icons-input-left"></i>
                <input type="text" name="name" placeholder="Gebruiksnaam" class="login-inputs" required autofocus>
            </div>
            <div class="login-flex">
                <i class="fas fa-lock icons-input-left"></i>
                <input type="password" name="password" class="login-inputs" placeholder="Wachtwoord" required><br>
                <i class="fas fa-eye icons-input-right"></i>
            </div>
        </form>
        <form class="login-form" name="newForm" method="get" onSubmit="formAction(this)">
            <div class="login-flex">
            <label>Geslacht</label>
            </div>
            <div class="login-flex">
                <input type="radio" name="gender" value="male" > Male
                <input type="radio" name="gender" value="female"> Female
            </div>
            <div class="login-flex">
                <input type="text" name="length" value="Lengte">
            </div>
            <div class="login-flex">
                <input type="text" name="weight" value="Gewicht">
            </div>
            <div class="login-flex">
                <label>Leeftijd</label>
            </div>
            <div class="login-flex">
                <input type="number" name="age" value="Leeftijd">
                <div class="login-form-buttons">
                <button class="login-form-submit" name="submit" type="submit" >Registeer</button>
            </div>
        </form>
    </div>
</div>

