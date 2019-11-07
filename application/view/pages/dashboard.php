<?php
require_once(ROOT . '/../application/controller/classes/FirstClass.php');
require_once(ROOT . '/../application/controller/classes/GetChartData.php');
require_once(ROOT . '/../application/controller/classes/GetPersonData.php');
require_once(ROOT . '/../application/config/connection.php');

$_SESSION['username'] = "Hulk hogan";
$_SESSION['valid'] = true;
$class = new GetPersonData($db);?>
<?php
if(isset($_SESSION['loginError']))
{?>
    <div class="alertsuccess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['loginError'] ?>
    </div>
    <?php
    unset($_SESSION['loginError']);

}
?>


    <?php @include('../application/view/components/menu.php')?>
    <div class="dash-container">    
        <div class="header">
            <h1 class="title">Overzicht</h1>
        </div>
        <div class="main">
            <div class="flex-container">
                    <div class="content account">
                        <div>
                            <?= $class->GetData(); ?> 
                        </div>
                        <a href="/user"><button class="button account-btn">Beheer account</button></a>
                    </div>
            </div>
            <div class="flex-container">
                <div class="content meter">
                    <div>
                        <canvas id="foo" width="400" height="350"></canvas>
                        <p id="gezondText"></p>
                    </div>
                </div>
                <div class="content">
                    <b><p style="text-align: center">Uw gewicht de afgelopen periode</p></b>
                    <div class="hidden" id="chart1">
                        <p id="NodataChart1" class="noDataText"></p>
                        <p id="ToFewChart1" class="noDataText"></p>
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="content">
                    <b><p style="text-align: center">Voedingswaarden van deze week</p></b>
                    <div class="hidden" id="chart2">
                        <p id="NodataChart2" class="noDataText"></p>
                        <canvas id="myChart2" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/chart.js"></script>
    <script src="assets/js/gauge.min.js"></script>
    <script src="assets/js/metertje.js"></script>

