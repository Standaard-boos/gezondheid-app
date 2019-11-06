<?php
  session_start();
  define('ROOT',(__DIR__));

function connection() {
  $servername = json_encode($configs->host);
  $username = json_encode($configs->app_info);
  $password = json_encode($configs->app_info);
  $dbname = json_encode($configs->app_info);

  $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

  return $conn;
}


$request = $_SERVER['REQUEST_URI'];

if(!isset($_SESSION['user_id'])) { 
  switch ($request) {
    //default
    case '/':
      $title = "Login";
      $pageContent = dirname(__DIR__, 1) . '/application/view/pages/login.php';
      break;

    case '':
      $title = "Login";   
      $pageContent = dirname(__DIR__, 1) . '/application/view/pages/login.php';
      break;

    case '/register' :
      $title = "Register";
      $pageContent = dirname(__DIR__, 1) . '/application/view/pages/register.php';
      break; 

    //dashboard
      case '/dash' :
      header('location: /');
      break;

    //404      
      default:
        $title = 'Sorry page not found!';
        $pageContent = dirname(__DIR__, 1) . '/application/view/error/404.php';
        break;

     //logout
      case '/x' :
        session_destroy();
        header('location: /');
        break; 
  }
} else {
  switch ($request) {
    //default
      case '/' :
        header('location: /dash');
        break;

      case '' :
        header('location: /dash');
        break;

      case '/dash' :
        $title = "overzicht";
        $pageContent = dirname(__DIR__, 1) . '/application/view/pages/dashboard.php';
        break;
    
      case '/seegoal':
        $title = "seegoal";
        $pageContent = dirname(__DIR__, 1) . '/application/view/pages/seegoal.php';
        break;

      case '/weekly-overview':
        $title = "weekly overview";
        $pageContent = dirname(__DIR__, 1) . '/application/view/pages/weeklyOverview.php';
        break;

      case '/addgoal':
        $title = "addgoal";
        $pageContent = dirname(__DIR__, 1) . '/application/view/pages/addGoals.php';
        break;

    
      case '/waarden' :
        $title = "Gegevens";
        $pageContent = dirname(__DIR__, 1) . '/application/view/pages/waarden.php';
        break;
      case '/sleep' :
        $title = "slapen";
        $pageContent = dirname(__DIR__, 1) . '/application/view/pages/sleep.php';
        break;

      case '/user' :
          $title = "Uw gegevens";
          $pageContent = dirname(__DIR__, 1) . '/application/view/pages/user.php';
          break;

      case '/alcohol' :
          $title = "Uw gegevens";
          $pageContent = dirname(__DIR__, 1) . '/application/view/pages/alcohol.php';
          break;
      
      case '/drugs' :
        $title = "Drugs";
        $pageContent = dirname(__DIR__, 1) . '/application/view/pages/drugs.php';
        break;

      case '/arbeidsomstandigheden' :
        $title = "Arbeidsomstandigheden";
        $pageContent = dirname(__DIR__, 1) . '/application/view/pages/arbeidsomstandigheden.php';
        break;

    // Ajax calls
      case '/ajax' :
        include dirname(__DIR__, 1) . '/application/controller/function/ajaxHandler.php';
        break;
      case '/deleteGoal' :
        include dirname(__DIR__, 1) . '/application/controller/function/ajaxHandler.php';
        break;
      case '/getGoals' :
        include dirname(__DIR__, 1) . '/application/controller/function/ajaxHandler.php';
        break;
    //API
      case '/api/chart':
        include dirname(__DIR__, 1) . '/application/controller/function/GetChartDataHandler.php';
        die();
        break;

    //logout
      case '/x' :
        session_destroy();
        header('location: /');
        break;
    
    //404      
      default:
        $title = 'Sorry page not found!';
        $pageContent = dirname(__DIR__, 1) . '/application/view/error/404.php';
        break;
  }
}

?><!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo 'Gezondsheid meter - ' . $title; ?></title>
        <link rel="apple-touch-icon" sizes="57x57" href="/assets/fav/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/assets/fav/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/assets/fav/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/fav/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/assets/fav/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/assets/fav/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/assets/fav/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/assets/fav/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/fav/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/assets/fav/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/assets/fav/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/assets/fav/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/fav/favicon-16x16.png">
        <link rel="manifest" href="/assets/fav/manifest.json">
        <meta name="msapplication-TileColor" content="#1F1F1F">
        <meta name="msapplication-TileImage" content="/assets/fav/ms-icon-144x144.png">
        <meta name="theme-color" content="#1F1F1F">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="https://kit.fontawesome.com/d6cae58ee4.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php require $pageContent; ?>
    </body>
</html>
