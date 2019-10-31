<?php 
require_once(ROOT . '/../application/controller/classes/weeklyOverview.php');
require_once(ROOT . '/../application/config/connection.php');

$class = new WeeklyOverview($db);


?>

<div class="container">
    <h2>Weekelijkse overzicht</h2>
    <p>gemiddelde aantal calorieën de laatste 7 dagen
     <?php echo $class->getNutritionData()?></p>
    <p> caloriebehoefte <?php echo $class->bmr() ?> </p>
    <p> BMI (Body mass index) geeft aan dat je <b><?php echo $class->bmi();?></b> hebt dat is aan de hand
    van je huidige gewicht en lengte</p>
</div>