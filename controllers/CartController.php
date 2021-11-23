<?

include_once '../models/CategoryModel.php';
include_once '../models/ProductsModel.php';

function addtocartAction()
{
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (!$itemId) return false;

    $resData = array();

    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
    }
    echo json_encode($resData);
}

function removefromcartAction()
{
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    //if (!$itemId) exit();

    $resData = array();
    $key = array_search($itemId, $_SESSION['cart']);
    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
    }
    echo json_encode($resData);
}


function indexAction($smarty)
{
    $itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $rsProducts = GetProductsFromArray($itemIds);
    $smarty->assign('rsProducts', $rsProducts);
    loadTemplate($smarty, 'cart');
}
