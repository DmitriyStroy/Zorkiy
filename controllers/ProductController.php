<?
include_once '../models/CategoryModel.php';
include_once '../models/TypeDeviceModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/NewsModel.php';
include_once '../models/DevicePictureModel.php';
include_once '../models/CharacteristicsModel.php';
include_once '../models/Device_ReviewsModel.php';
include_once '../models/DeviceReviewsAnswersModel.php';

function indexAction($smarty)
{
    $ProductId = isset($_GET['id']) ? $_GET['id'] : null;
    $Name = isset($_GET['name']) ? $_GET['name'] : null;

    $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();
    $smarty->assign('MenuCategory', $MenuCategory);

    $Product  = GetProductById($ProductId);
    $smarty->assign('Product', $Product);


    $smarty->assign('itemInCart', 0);
    if (in_array($ProductId, $_SESSION['cart'])) {
        $smarty->assign('itemInCart', 1);
    }

    loadTemplate($smarty, 'header');
    if ($Name == 'characteristic') {
        loadTemplate($smarty, 'product_characteristics');
    } else  if ($Name == 'comments') {
        if (!isset($_SESSION['user'])) {
            $smarty->assign('hideLoginBox', 1);
        }
        $GetReviewsByProduct = GetReviewsByProduct($ProductId);
        $smarty->assign('GetReviewsByProduct', $GetReviewsByProduct);

        $GetCOUNTRatingByProduct = GetCOUNTRatingByProduct($ProductId);
        $smarty->assign('GetCOUNTRatingByProduct', $GetCOUNTRatingByProduct);

        $GetAverageRatingByProduct = GetAverageRatingByProduct($ProductId);

        $smarty->assign('GetAverageRatingByProduct', $GetAverageRatingByProduct);
        loadTemplate($smarty, 'product_reviews');
    } else {
        loadTemplate($smarty, 'product');
    }

    loadTemplate($smarty, 'footer');
}




function AddCommentsAction()
{
    if (!isset($_REQUEST['device']) and !isset($_SESSION['user']['Id_User'])) {
        redirect('/');
    }
    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 200) {
        $device = check_correctness_string($_REQUEST['device']);
        $user = $_SESSION['user']['Id_User'];
        $rating = check_correctness_string($_REQUEST['rating']);
        $text_comment = check_correctness_string($_REQUEST['text_comment']);

        $res = CreateReviews($device, $user, $rating, $text_comment);

        if (!$res) {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка добавления комментария';
            echo json_encode($resData);
            return;
        }
        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Комментарий добавлен';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка добавления комментария';
        }
        echo json_encode($resData);
    }
}
