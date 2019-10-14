<?php
require_once(ROOT . '/../application/controller/classes/FirstClass.php');
require_once(ROOT . '/../application/controller/classes/GetChartData.php');
require_once(ROOT . '/../application/controller/classes/GetPersonData.php');
$_SESSION['username'] = "Hulk hogan";
$_SESSION['valid'] = true;


if (isset($_SESSION['valid'])) { ?>

    <div class="dash-container">
        <div class="header">
            <h1 class="title">Overzicht</h1>
            <a class="logout" href="/x"><span class="button desktop">Logout</span><i class="fas fa-sign-out-alt fa-2x mobile"></i></a>
        </div>
        <div class="main">
            <div class="flex-container">
                    <div class="content account">
                        <div>
                            <?php echo GetPersonData::GetData(); ?> 
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

    <script src="assets/js/chart.js"></script>
<?php } ?>


<!-- <div class="dash-container">
        <h1 >Overzicht</h1>
        <div class="">
            <?php echo GetPersonData::GetData(); ?>
        </div>
        <div class="buttonContainer">
            <button class="button">Invoer Gegevens</button>
            <a class="button" href="seegoal"><button>Doelen</button></a>
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
    </div> -->