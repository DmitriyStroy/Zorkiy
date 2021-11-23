<?

/* 
    Controller main page 
*/
//connection model
include_once '../models/CategoryModel.php';         //category device
function indexAction($smarty)
{
    $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();


    $smarty->assign('MenuCategory', $MenuCategory);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'contacts');
    loadTemplate($smarty, 'footer');
}
