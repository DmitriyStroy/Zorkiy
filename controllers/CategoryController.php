<?
/*

    Controller page Category

*/


/*

    Controller page TypeDevice

*/

//connection models
include_once '../models/CategoryModel.php';
include_once '../models/TypeDeviceModel.php';
include_once '../models/ProductsModel.php';

/*

    shapping page Catygory

    @param object $smarty - template

*/
function indexAction($smarty)
{
    $Category_ID = isset($_GET['id']) ? $_GET['id'] : null;

    if (isset($Category_ID)) {
        $GetCategor = GetTypeDeviceByURLCategoryRU($Category_ID);
    } else {
        $GetCategor = GetAllTypeDeviceRU();
    }
    $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();
    $smarty->assign('MenuCategory', $MenuCategory);
    $smarty->assign('GetCategor', $GetCategor);



    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
}

