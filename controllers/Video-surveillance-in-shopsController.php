<?
include_once '../models/CategoryModel.php';
include_once '../models/TypeDeviceModel.php';

function indexAction($smarty)
{
    $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();
    $smarty->assign('MenuCategory', $MenuCategory);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'video-surveillance-in-shops');
    loadTemplate($smarty, 'footer');
}
