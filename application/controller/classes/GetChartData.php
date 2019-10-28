<?php

class GetChartData{

    function Data(){

        $gewicht = 0;
        $gebruiker_ID = $_SESSION['user_id'];
        //$username = $_SESSION['user_name'];
        $array = null;


        $connect = new TijdelijkConn();
        $conn = $connect->connection();
        $sql = "SELECT weights FROM weight WHERE user_id = ?  ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$gebruiker_ID);
        $stmt->execute();
        $stmt->bind_result($gewicht);

        /* fetch values */
        $i = 0;
        while ($stmt->fetch()) {
            $array[$i] = array($gewicht);
            $i++;
        }


        return $array;
    }

    function pieData(){

        $connect = new TijdelijkConn();
        $conn = $connect->connection();
        $sql ="";
        $vetArray = 0;
        $suikerArray = 0;
        $zoutArray = 0;
        $protineArray = 0;
        $today = date("Y-m-d");
        $WeekAgo = date('d-m-Y', strtotime("-1 week"));





        $sql = "SELECT food.fat, food.sugar , food.salt, food.protein FROM food LEFT JOIN  user_food ON user_food.food_id = food.ID WHERE user_food.user_ID = ? AND date BETWEEN '$WeekAgo' AND '$today'"; //AND date BETWEEN '2019-10-26' AND '2019-10-28'


           // $sql = "SELECT drinks.fat, drinks.sugar, drinks.protine FROM drinks INNER JOIN user_drinks ON user_drinks.drinken_id = drinks.ID WHERE user_drinks.user_id = 13";


            //$sql = "SELECT nutrison.vet , nutrison.suiker , nutrison.zout FROM `nutrison` LEFT JOIN eten_user ON eten_user.nutrision_id = nutrison.ID WHERE eten_user.user_id = 1 ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i',$_SESSION['user_id']);
            $stmt->execute();
            $stmt->bind_result($vet , $suiker, $zout , $protine);






            /* fetch values */
            $i = 0;
            while ($stmt->fetch()) {
                $vetArray += $vet;
                $suikerArray += $suiker;
                $zoutArray += $zout;
                $protineArray += $protine;



            }





        $totaal = $vetArray + $zoutArray + $suikerArray + $protineArray;
        if($totaal != 0){
            $totaal = $totaal / 100;

            $vetArray = $vetArray / $totaal;
            $suikerArray = $suikerArray / $totaal;
            $zoutArray = $zoutArray / $totaal;
            $protineArray = $protineArray / $totaal;

            $array = array(round($vetArray,1) , round($suikerArray ,1) , round($zoutArray,1), round($protineArray,1));

            return $array;
        }else{
            return null;
        }




    }

}


?>