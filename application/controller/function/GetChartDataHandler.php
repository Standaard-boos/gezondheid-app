<?php

    require_once(ROOT . '/../application/controller/classes/GetChartData.php');


    $class = new GetChartData();

    $data1 = $class->Data();
    $data2 = $class->pieData();

    header('Content-Type: application/json');

    $array = array($data1,$data2);
    echo json_encode($array);


?>
