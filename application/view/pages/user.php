<?php @include('../application/view/components/menu.php')?>
<?php
require_once(ROOT . '/../application/controller/classes/changeUserValues.php');
require_once(ROOT . '/../application/config/connection.php');

$user_info = new changeUserValues($db);
$user_info->getValueUser();

?>

