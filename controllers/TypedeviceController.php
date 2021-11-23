<?
include_once '../models/TypeDeviceModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/CategoryModel.php';
include_once '../models/Device_ReviewsModel.php';

function indexAction($smarty)
{
    $TypeDevice_Name = isset($_GET['id']) ? $_GET['id'] : null;

    $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();
    $smarty->assign('MenuCategory', $MenuCategory);
    
    $GetTypeDevice = GetAllProductsByURL($TypeDevice_Name);
    $smarty->assign('GetTypeDevice', $GetTypeDevice);


    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'typedevice');
    loadTemplate($smarty, 'footer');
}
