<?php
require_once(ROOT . '/../application/config/connection.php');
require_once(ROOT . '/../application/controller/classes/drugs.php');

$drug = new Drugs($db);
$drug->addDrugs();
?>
<?php @include('../application/view/components/menu.php')?>
<?php
if(isset($_SESSION['addeddrugs']))
{?>
    <div class="alertsuccess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['addeddrugs'] ?>
    </div>
    <?php
    unset($_SESSION['addeddrugs']);
}
?>
<div class="container-form">
    <h1 class="title">Drugs toevoegen</h1>
    <form class="form" action="/drugs" method="post">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>">
        <h4 class="input-icon">Kies een drug uit </h4>
        <div class="input-icon">
            <select class="input" name="drug_types" required>
                <option value="">Kies uit...</option>
                <option value="Speed">Speed</option>
                <option value="Cocaine">Cocaïne</option>
                <option value="GHB">GHB</option>
                <option value="Cannabis">Cannabis (hasj en wiet)</option>
                <option value="Heroine">Heroïne</option>
                <option value="LSD">LSD</option>
                <option value="Methadon">Methadon</option>
                <option value="Paddo">Paddo’s en truffels</option>
                <option value="XTC">XTC</option>
                <option value="Ketamine">Ketamine</option>
            </select>
        </div>
        <h4 class="input-icon">Hoeveel heb je genomen? (Pil, Spuit, lijntje, gram)</h4>
        <div class="input-icon">
            <select class="input" name="quantity" id="select_quantity" required>
                <option value="">Kies uit...</option>
                <option value="0.25">1/4</option>
                <option value="0.50">1/2</option>
                <option value="0.75">3/4</option>
                <option value="1.00">1 </option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="more">3 of meer?</option>
            </select>
        </div>
        <div class="input-icon">
            <input type="hidden" class="input input_quantity" name="input_quantity" 
                placeholder="Vul hoeveelheid in"required>
        </div>
        <button class="button" name="submit" type="submit">Drugs toevoegen</button>
        <br>
        <br>
        <div class="input-icon">
            <a href="../dash" class="button">Terug</a>
        </div>
    </form>
</div>
<script src="assets/js/script.js"></script>        



