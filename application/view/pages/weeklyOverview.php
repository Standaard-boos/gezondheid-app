<?php 
require_once(ROOT . '/../application/controller/classes/weeklyOverview.php');
require_once(ROOT . '/../application/config/connection.php');

$class = new WeeklyOverview($db);
$class->bmi();

?>