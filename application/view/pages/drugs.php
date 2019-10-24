<?php
require_once(ROOT . '/../application/config/connection.php');
require_once(ROOT . '/../application/controller/classes/drugs.php');

$drug = new Drugs($db);
$drug->addDrugs();
?>
<?php @include('../application/view/components/menu.php')?>
<div class="container-form">
    <h1 class="title">Drugs toevoegen</h1>
    <form class="form" action="/drugs" method="post">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>">
        <h4 class="input-icon">Kies een drug uit </h4>
        <div class="input-icon">
            <select class="input" name="drug_types" required>
                <option value="">Kies uit...</option>
                <option value="1">Speed</option> 
                <option value="2">Cocaïne</option> 
                <option value="3">GHB</option> 
                <option value="4">Cannabis (hasj en wiet)</option> 
                <option value="5">Heroïne</option> 
                <option value="6">LSD</option> 
                <option value="7">Methadon</option> 
                <option value="8">Paddo’s en truffels</option> 
                <option value="9">XTC</option> 
                <option value="10">Ketamine</option> 
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
                <option value="more">meer dan 3</option> 
            </select>
        </div>
        <div class="input-icon">
            <input type="hidden" class="input input_quantity" name="input_quantity" 
                placeholder="Vul hoeveelheid in"required>
        </div>
        <button class="button" name="submit" type="submit">Drugs toevoegen</button>
    </form>
</div>
<script src="assets/js/script.js"></script>        



