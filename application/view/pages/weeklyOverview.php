<?php @include('../application/view/components/menu.php')?>
<?php 
require_once(ROOT . '/../application/controller/classes/weeklyOverview.php');
require_once(ROOT . '/../application/config/connection.php');

$class = new WeeklyOverview($db);

?>

<div class="dash-container">
    <div class="header">
        <h1 class="title">Weekelijkse overzicht</h1>
    </div>
    <div class="main">
        <div class="flex-container">
            <div class="content content-small">
                <h3>Gemiddelde aantal calorieën de laatste 7 dagen:</h3>
                <h2><?= $class->getNutritionData()?></h2>
                <i class="far fa-calendar-alt fa-6x icon" style="color: green;"></i>
            </div>
            <div class="content content-small">
                <h3>Caloriebehoefte:</h3>
                <h2><?= $class->bmr() ?></h2>
                <i class="fas fa-utensils fa-6x icon" style="color: green;"></i>
            </div>
            <div class="content content-small">
                <h3>BMI (Body mass index):</h3>
                <h2><?= $class->bmi(); ?></h2>
                <i class="fas fa-child fa-6x icon" style="color: green"></i>
            </div>
            <div class="content content-small">
                <h3>Weeklijkse Doelen:</h3>
                <h2>Aantal afgeronde doelen: <?= $class->goalsAchieved()?> </h2>
                <i class="fas fa-bullseye fa-6x icon" style="color: green;"></i>
            </div>
        </div>
    </div>
</div>
