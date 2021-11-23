<?

session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

include_once '../config/config.php';            //initilization settings
include_once '../config/db.php';                 //initilization connet to database
include_once '../library/mainFunctions.php';    //main functions
include_once '../controllers/SettingPagesController.php';         // model device

//definitiom from what controller we will work
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

//definition from what function we will work
$actionName = isset($_GET['action']) ? $_GET['action'] : 'Index';


if (isset($_SESSION['user'])){
    $smarty -> assign('arUser', $_SESSION['user']);    
}

$smarty->assign('cartCntItems', count($_SESSION['cart']));
loadPage($smarty, $controllerName, $actionName);
