<?
include_once '../models/CategoryModel.php';
include_once '../models/TypeDeviceModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/CheckoutModel.php';
include_once '../models/PurchaseModel.php';


function indexAction($smarty)
{
    $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();
    $smarty->assign('MenuCategory', $MenuCategory);

    $Orders = GetUserOrders($_SESSION['user']['U_Login']);
    
    $smarty->assign('DataOrders', $Orders);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'orders');
    loadTemplate($smarty, 'footer');
}
