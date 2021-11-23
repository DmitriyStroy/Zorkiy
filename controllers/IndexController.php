<?

/* 
    Controller main page 
*/
//connection model
include_once '../models/CategoryModel.php';         //category device
include_once '../models/TypeDeviceModel.php';       // type device
include_once '../models/ManufacturerModel.php';     // manufacturer device
include_once '../models/ProductsModel.php';         // model device


function testAction()
{
    echo 'IndexController.php > testAction';
}

function indexAction($smarty)
{
    $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();
    $smarty->assign('MenuCategory', $MenuCategory);
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}