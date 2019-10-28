<?php @include('../application/view/components/menu.php')?>
<?php
require_once(ROOT . '/../application/controller/classes/changeUserValues.php');
require_once(ROOT . '/../application/config/connection.php');


if(isset($_SESSION['goaldeleted']))
{?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $_SESSION['goaldeleted'] ?>
    </div>
    <?php
    unset($_SESSION['goaldeleted']);
}

$user_info = new changeUserValues($db);
$user_info->getValueUser();

?>

