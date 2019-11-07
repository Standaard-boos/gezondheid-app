<?php

    sleepPoints();

    require_once(ROOT . '/../application/controller/classes/weeklyOverview.php');
    require_once(ROOT . '/../application/controller/classes/GetScoreData.php');


    $class1 = new WeeklyOverview();
    $class2 = new GetScoreData();

    $data = $class1->sleepPoints();
    $data2 = $class2->GetScoreAlcolhol();
    $data3 = $class2->GetScoreWork();
    $data4

    header('Content-Type: application/json');




    $array = array($data,$data2);

    $dataJson = json_encode($array);

    echo $dataJson;


?>
