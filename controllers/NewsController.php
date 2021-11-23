<?
include_once '../models/CategoryModel.php';
include_once '../models/TypeDeviceModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/NewsModel.php';
/*

    shapping page Catygory
    @param object $smarty - template

*/
function indexAction($smarty)
{
    $News_ID = isset($_GET['id']) ? $_GET['id'] : null;

    $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();
    $smarty->assign('MenuCategory', $MenuCategory);


    loadTemplate($smarty, 'header');
    if (isset($News_ID)) {
        $rsNews = GetNews($News_ID);
        $smarty->assign('rsNews', $rsNews);
        loadTemplate($smarty, 'detailsnews');
    } else {
        $rsNews = GetAllNews();
        $smarty->assign('rsNews', $rsNews);
        loadTemplate($smarty, 'news');
    }
    loadTemplate($smarty, 'footer');
}


function CreateAction()
{
    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 203) {

        $N_Image = check_correctness_string($_REQUEST['N_Image']);
        $N_Name = check_correctness_string($_REQUEST['N_Name']);
        $N_ru_Name = check_correctness_string($_REQUEST['N_ru_Name']);
        $N_ShortDescription = check_correctness_string($_REQUEST['N_ShortDescription']);
        $N_ru_ShortDescription = check_correctness_string($_REQUEST['N_ru_ShortDescription']);
        $N_Description = $_REQUEST['N_Description'];
        $N_ru_Description = $_REQUEST['N_ru_Description'];

        $res = CreateNews(
            $N_Image,
            $N_Name,
            $N_ru_Name,
            $N_ShortDescription,
            $N_ru_ShortDescription,
            $N_Description,
            $N_ru_Description
        );

        if (!$res) {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка создания новосоти';
            echo json_encode($resData);
            return;
        }
        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Новость добавлена';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка добавления новосоти';
        }
        echo json_encode($resData);
    }
}
