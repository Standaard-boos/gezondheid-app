<?php

    require_once(ROOT . '/../application/controller/classes/GetChartData.php');


    $class = new GetChartData();

    $data = $class->Data();
    $data2 = $class->pieData();

    header('Content-Type: application/json');




    $array = array($data,$data2);

    $dataJson = json_encode($array);

    echo $dataJson;


?>
