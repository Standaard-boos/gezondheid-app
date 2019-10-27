<?php
require_once(ROOT . '/../application/controller/classes/changeUserValues.php');
require_once(ROOT . '/../application/config/connection.php');

$user_info = new changeUserValues($db);

if(isset($_SESSION['passEdited']))
{?>
    <div class="alertsuccess">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['passEdited'] ?>
    </div>
    <?php
    unset($_SESSION['passEdited']);
}
$user_info->getValueUser();

?>
