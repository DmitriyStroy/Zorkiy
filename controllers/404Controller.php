<?
include_once '../models/CategoryModel.php';
include_once '../models/TypeDeviceModel.php';

function indexAction($smarty)
{
    $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();
    $smarty->assign('MenuCategory', $MenuCategory);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'page404');
    loadTemplate($smarty, 'footer');
}
