<?php

    require_once(ROOT . '/../application/controller/classes/GetChartData.php');


    $class = new GetChartData();

    $data = $class->Data();

    header('Content-Type: application/json');

    echo json_encode($data);


?>
