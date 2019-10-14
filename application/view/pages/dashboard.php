<?php
require_once(ROOT . '/../application/controller/classes/FirstClass.php');
require_once(ROOT . '/../application/controller/classes/GetChartData.php');
require_once(ROOT . '/../application/controller/classes/GetPersonData.php');
require_once(ROOT . '/../application/config/connection.php');

$_SESSION['username'] = "Hulk hogan";
$_SESSION['valid'] = true;
$class = new GetPersonData($db);

if (isset($_SESSION['valid'])) {

    ?>

    <div class="dashboardContainer">
        <h2 class="h2">Overzicht</h2>
        <!-- <h3 class="h3">Welkom : <?php //echo $_SESSION['username']; ?></h3> -->
        <div class="dataPerson">
            <?php echo $class->getData(); ?>
        </div>
        <div class="buttonContainer">
            <button class="button">Invoer Gegevens</button>
            <button class="button">Doelen</button>
            <a href="../addgoal" class="button">Voeg doel toe</a>
            <a href="../seegoal" class="button">Zie doelen</a>
        </div>
        <div>
            <select id="ChartSelectBox" class="selectbox" onchange="ShowHideCharts()">
                <option value="kies">kies...</option>
                <option value="voeding">chart voor voeding</option>
                <option value="gewicht">chart voor gewicht</option>
            </select>
            <div class="containerCharts">
                <div class="hidden" id="chart1">
                    <canvas id="myChart" width="400" height="400"></canvas>
                </div>
                <div class="hidden" id="chart2">
                    <canvas id="myChart2" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/chart.js"></script>
<?php } ?>
