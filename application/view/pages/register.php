
<div class="container_1">
<h1>Persoon Registeren</h1>
    <div>
        <form>
            <div>
            <i class="fas fa-user-circle"></i>  
            <input type="text" name="username" value="Gebruikersnaam"> <br><br> 
            </div>
            <input type="email" name="email" value="Email"><br>
            <label>Wachtwoord</label><br>
            <input type="password" name="pass" value=""><br>
        </form>
        <form name="newForm" method="get" onSubmit="formAction(this)">
            <label>Geslacht</label><br>
            <input type="radio" name="gender" value="male" > Male
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="text" name="length" value="Lengte"><br><br>
            <input type="text" name="weight" value="Gewicht"><br><br>
            <label>Leeftijd</label><br>
            <input type="number" name="age" value="Leeftijd"><br><br>
            <input type="submit" value="Registreer">
        </form>
    </div>
</div>
