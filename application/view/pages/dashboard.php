<?php
require_once(ROOT . '/../application/controller/classes/FirstClass.php');
require_once(ROOT . '/../application/controller/classes/GetChartData.php');
require_once(ROOT . '/../application/controller/classes/GetPersonData.php');
require_once(ROOT . '/../application/config/connection.php');

$_SESSION['username'] = "Hulk hogan";
$_SESSION['valid'] = true;
$class = new GetPersonData($db);

if (isset($_SESSION['valid'])) {?>

    
    <div class="dash-container">
        <div class="menu menu-close">
            <i id="menuButton" class="fas fa-bars fa-2x"></i>
            <ul class="menu-items">
                <a class="items" href="/seegoals"><li>Doelen</li></a>
                <a class="items" href="/waarden"><li>Waarden</li></a>
                <a class="items" href="/x"><li>Logout</li></a>
            </ul>
        </div>
        <div class="header">
            <h1 class="title">Overzicht</h1>
        </div>
        <div class="main">
            <div class="flex-container">
                    <div class="content account">
                        <div>
                            <?php echo $class->GetData(); ?> 
                        </div>
                        <a href="/user"><button class="button account-btn">Beheer account</button></a>
                    </div>
            </div>
            <div class="flex-container">
                <div class="content">
                    <div class="hidden" id="chart1">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="content">
                    <div class="hidden" id="chart2">
                        <canvas id="myChart2" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/menu.js"></script>
    <script src="assets/js/chart.js"></script>
<?php } ?>
