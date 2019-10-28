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
<?php if (isset($_SESSION['valid'])) {?>
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
