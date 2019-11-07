<?php



    require_once(ROOT . '/../application/controller/classes/weeklyOverview.php');
    require_once(ROOT . '/../application/controller/classes/GetScoreData.php');
    require_once(ROOT . '/../application/config/connection.php');


    $class1 = new WeeklyOverview($db);
    $class2 = new GetScoreData($db);

    $data = $class1->sleepPoints();
    $data2 = $class2->GetScoreAlcolhol();
    $data3 = $class2->GetScoreWork();
    //$data4

    header('Content-Type: application/json');




    $array = array($data,$data2,$data3);

    $dataJson = json_encode($array);

    echo $dataJson;


?>
