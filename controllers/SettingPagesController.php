<?
include_once '../models/CategoryModel.php';
include_once '../models/SettingPagesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/TypeDeviceModel.php';
include_once '../models/NewsModel.php';


function LoadMetaData($smarty)
{
    $data = GetMetaDataPageRU();
    if (
        (isset($_GET['controller']) and
            $_GET['controller'] != 'product' and
            $_GET['controller'] != 'category' and
            $_GET['controller'] != 'typedevice' and
            $_GET['controller'] != 'manufacturer' and
            $_GET['controller'] != 'checkout' and
            $_GET['controller'] != 'news' and
            $_GET['controller'] != 'user' and
            $_GET['controller'] != 'orders' and
            $_GET['controller'] != 'cart' and
            $_GET['controller'] != 'contacts' and
            $_GET['controller'] != 'video-surveillance-at-enterprises' and
            $_GET['controller'] != 'video-surveillance-in-shops' and
            $_GET['controller'] != 'video-surveillance-in-schools-and-kindergartens' and
            $_GET['controller'] != 'video-surveillance-in-restaurants' and
            $_GET['controller'] != 'video-surveillance-in-parking-lots' and
            $_GET['controller'] != 'video-surveillance-in-offices' and
            $_GET['controller'] != 'video-surveillance-in-a-private-house' and
            $_GET['controller'] != 'osbb-security-video' and
            $_GET['controller'] != '404' and
            $_GET['controller'] != 'admin' and
            $_GET['controller'] != 'offer' and
            $_GET['controller'] != 'feedback' and
            $_GET['controller'] != 'checkout') and ($_SERVER['REQUEST_URI'] != '/')
    ) {
        Page404();
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'admin') {
        if (isset($_SESSION['user']['U_UserRights']) and $_SESSION['user']['U_UserRights'] == 1) {
            $Page_Header = "Видеонаблюдение в частном доме";
            $Page_Title = "ZORKIY | " . $Page_Header;
            $Page_Description = "";
            $Page_Image = "";
        } else {
            Page404();
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'video-surveillance-in-a-private-house') {
        if (!isset($_GET['id']) and !isset($_GET['name'])) {
            $Page_Header = "Видеонаблюдение в частном доме";
            $Page_Title = "ZORKIY | " . $Page_Header;
            $Page_Description = "";
            $Page_Image = "/templates/default/images/house.jpg";
        } else {
            Page404();
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'video-surveillance-at-enterprises') {
        if (!isset($_GET['id']) and !isset($_GET['name'])) {
            $Page_Header = "Видеонаблюдение на предприятиях";
            $Page_Title = "ZORKIY | " . $Page_Header;
            $Page_Description = "";
            $Page_Image = "/templates/default/images/company.jpg";
        } else {
            Page404();
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'video-surveillance-in-schools-and-kindergartens') {
        if (!isset($_GET['id']) and !isset($_GET['name'])) {
            $Page_Header = "Видеонаблюдение в школах и детских садах";
            $Page_Title = "ZORKIY | " . $Page_Header;
            $Page_Description = "";
            $Page_Image = "/templates/default/images/school.jpg";
        } else {
            Page404();
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'video-surveillance-in-shops') {
        if (!isset($_GET['id']) and !isset($_GET['name'])) {
            $Page_Header = "Видеонаблюдение в магазинах";
            $Page_Title = "ZORKIY | " . $Page_Header;
            $Page_Description = "";
            $Page_Image = "/templates/default/images/shop.jpg";
        } else {
            Page404();
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'video-surveillance-in-restaurants') {
        if (!isset($_GET['id']) and !isset($_GET['name'])) {
            $Page_Header = "Видеонаблюдение для ресторанов, кафе и баров";
            $Page_Title = "ZORKIY | " . $Page_Header;
            $Page_Description = "";
            $Page_Image = "/templates/default/images/restaurant.jpg";
        } else {
            Page404();
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'video-surveillance-in-parking-lots') {
        if (!isset($_GET['id']) and !isset($_GET['name'])) {
            $Page_Header = "Видеонаблюдение на автостоянках";
            $Page_Title = "ZORKIY | " . $Page_Header;
            $Page_Description = "";
            $Page_Image = "/templates/default/images/car-park.jpg";
        } else {
            Page404();
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'video-surveillance-in-offices') {
        if (!isset($_GET['id']) and !isset($_GET['name'])) {
            $Page_Header = "Видеонаблюдение в офисах";
            $Page_Title = "ZORKIY | " . $Page_Header;
            $Page_Description = "";
            $Page_Image = "/templates/default/images/office.jpg";
        } else {
            Page404();
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'osbb-security-video') {
        if (!isset($_GET['id']) and !isset($_GET['name'])) {
            $Page_Header = "Видеонаблюдение в офисах";
            $Page_Title = "ZORKIY | " . $Page_Header;
            $Page_Description = "";
            $Page_Image = "/templates/default/images/022.jpg";
        } else {
            Page404();
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'product') {
        if (isset($_GET['action'])) {
            $Page_Header = "";
            $Page_Title = "";
            $Page_Description = "";
            $Page_Image = "";
        } else
        if (isset($_GET['name']) and $_GET['name'] != 'characteristic' and $_GET['name'] != 'comments') {
            Page404();
        } else if (is_numeric($_GET['id']) and (isset($_GET['name']) and $_GET['name'] == 'characteristic')) {
            $data = GetProductNameById($_GET['id']);
            $Page_Header = "Характеристики " . $data['ProductName'];
            $Page_Title = "ZORKIY | Характеристики {$data['ProductName']}";
            $Page_Description = "Характеристики {$data['ProductName']} купить на ZORKIY. Оперативная доставка ✈ Гарантия качества ☑ Лучшая цена $";
            $Page_Image = "/templates/default/images/products/{$data['Model_ID']}/{$data['DP_Image']}";
        } else if (is_numeric($_GET['id']) and (isset($_GET['name']) and $_GET['name'] == 'comments')) {
            $data = GetProductNameById($_GET['id']);
            $Page_Header = "Отзывы покупателей о {$data['ProductName']}";
            $Page_Title = "ZORKIY | Отзывы о {$data['ProductName']}";
            $Page_Description = "Отзывы о {$data['ProductName']} купить на ZORKIY. Оперативная доставка ✈ Гарантия качества ☑ Лучшая цена $";
            $Page_Image = "/templates/default/images/products/{$data['Model_ID']}/{$data['DP_Image']}";
        } else if (isset($_GET['id']) and !isset($_GET['name'])) {
            $data = GetProductNameById($_GET['id']);
            $Page_Header = $data['ProductName'];
            $Page_Title = "ZORKIY | " . $data['ProductName'] . ": характеристика, описание, продажа, отзывы";
            $Page_Description = $data['ProductName'] . " купить на zorkiy.com.ua";
            $Page_Image = "/templates/default/images/products/{$data['Model_ID']}/{$data['DP_Image']}";
        } else {
            Page404();
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'category') {
        if (isset($_GET['action'])) {
            $Page_Header = "";
            $Page_Title = "";
            $Page_Description = "";
            $Page_Image = "";
        } else
        if (isset($_GET['id'])) {
            foreach (GetCategoryByURL($_GET['id']) as $data) {
                $Page_Header = $data['Category_Name_RU'];
                $Page_Title = "ZORKIY | " . $data['Category_Name_RU'];
                $Page_Description = $data['Category_URL'] . " в интернет-магазине ZORKIY. ☎: +38(099) 300 01 02, +38(044) 334 32 92. $ лучшие цены, ✈ быстрая доставка, ☑ гарантия!";
                $Page_Image = "";
            }
        } else {
            foreach (GetMetaDataPageRU() as $data) {
                $Page_Header = $data['M_Header_ru'];
                $Page_Title = $data['M_Title_ru'];
                $Page_Description = $data['M_Description_ru'];
                $Page_Image = $data['M_Image_ru'];
            }
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'typedevice') {

        if (isset($_GET['action']) == 'create') {
            $Page_Header = "";
            $Page_Title = "";
            $Page_Description = "";
            $Page_Image = "";
        } else
        if (is_numeric($_GET['id'])) {
            d($_GET);
        } else
        if (isset($_GET['id'])) {
            $typeDevice = GetTypeDeviceByURL($_GET['id'])[0];
            $Page_Header = "" . $typeDevice['TD_Name_RU'];
            $Page_Title = "ZORKIY | " . $typeDevice['TD_Name_RU'];
            $Page_Description = "" . $typeDevice['TD_Name_RU'];
            $Page_Image = $typeDevice['TD_Image'];
        } else {
            foreach (GetMetaDataPageRU() as $data) {
                $Page_Header = $data['M_Header_ru'];
                $Page_Title = $data['M_Title_ru'];
                $Page_Description = $data['M_Description_ru'];
                $Page_Image = $data['M_Image_ru'];
            }
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'manufacturer') {
        if (isset($_GET['action']) == 'create') {
            $Page_Header = "";
            $Page_Title = "";
            $Page_Description = "";
            $Page_Image = "";
        } else
        if (is_numeric($_GET['id'])) {
            d($_GET);
        } else
        if (isset($_GET['id'])) {
            $typeDevice = GetTypeDeviceByURL($_GET['id'])[0];
            $Page_Header = "" . $typeDevice['TD_Name_RU'];
            $Page_Title = "ZORKIY | " . $typeDevice['TD_Name_RU'];
            $Page_Description = "" . $typeDevice['TD_Name_RU'];
            $Page_Image = $typeDevice['TD_Image'];
        } else {
            foreach (GetMetaDataPageRU() as $data) {
                $Page_Header = $data['M_Header_ru'];
                $Page_Title = $data['M_Title_ru'];
                $Page_Description = $data['M_Description_ru'];
                $Page_Image = $data['M_Image_ru'];
            }
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'checkout') {
        if (isset($_GET['action'])) {
            $Page_Header = "";
            $Page_Title = "";
            $Page_Description = "";
            $Page_Image = "";
        }
        if (isset($_GET['id']) and $_GET['id'] == 'save') {
            $Page_Header = "";
            $Page_Title = "";
            $Page_Description = "";
            $Page_Image = "";
        } else {
            foreach (GetMetaDataPageRU() as $data) {
                $Page_Header = $data['M_Header_ru'];
                $Page_Title = $data['M_Title_ru'];
                $Page_Description = $data['M_Description_ru'];
                $Page_Image = $data['M_Image_ru'];
            }
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'news') {
        if (isset($_GET['action'])) {
            $Page_Header = "";
            $Page_Title = "";
            $Page_Description = "";
            $Page_Image = "";
        }
        if (isset($_GET['id'])) {

            foreach (GetNews($_GET['id']) as $data) {
                $Page_Header = $data['N_ru_Name'];
                $Page_Title = "ZORKIY | " . $data['N_ru_Name'];
                $Page_Description = $data['N_ru_Description'];

                $Page_Image = $data['N_Image'];
            }
        } else {
            foreach (GetMetaDataPageRU() as $data) {
                $Page_Header = $data['M_Header_ru'];
                $Page_Title = $data['M_Title_ru'];
                $Page_Description = $data['M_Description_ru'];

                $Page_Image = $data['M_Image_ru'];
            }
        }
    } else if (isset($_GET['controller']) and $_GET['controller'] == 'cart') {
        if (isset($_SESSION['cart'])) {
            $Page_Header = "";
            $Page_Title = "";
            $Page_Description = "";
            $Page_Image = "";
        }
    } else if (
        ((isset($_GET['controller']) and $_GET['controller'] == 'user') and
            (isset($_GET['action']) and ($_GET['action'] == 'login'))) or
        ((isset($_GET['controller']) and $_GET['controller'] == 'user') and
            (isset($_GET['action']) and ($_GET['action'] == 'register'))) or
        ((isset($_GET['controller']) and $_GET['controller'] == 'user') and
            (isset($_GET['action']) and ($_GET['action'] == 'update'))) or
        ((isset($_GET['controller']) and $_GET['controller'] == 'user') and
            (isset($_GET['action']) and ($_GET['action'] == 'logout'))) or
        ((isset($_GET['controller']) and $_GET['controller'] == 'user') and
            (isset($_GET['action']) and ($_GET['action'] == 'forgotpassword'))) or
        ((isset($_GET['controller']) and $_GET['controller'] == 'user') and
            (isset($_GET['action']) and ($_GET['action'] == 'activation'))) or
        ((isset($_GET['controller']) and $_GET['controller'] == 'user') and
            (isset($_GET['action']) and ($_GET['action'] == 'requestconfirmationemail')))
    ) {
        $Page_Header = "";
        $Page_Title = "";
        $Page_Description = "";
        $Page_Image = "";
    } else {
        if ($_SERVER['REQUEST_URI'] == '/' or $_GET['controller'] == 'user' or $_GET['controller'] == '404') {
            foreach (GetMetaDataPageRU() as $data) {
                $Page_Header = $data['M_Header_ru'];
                $Page_Title = $data['M_Title_ru'];
                $Page_Description = $data['M_Description_ru'];
                $Page_Image = "/templates/default/images/" . $data['M_Image_ru'];
            }
        } else {
            $Page_Header = "";
            $Page_Title = "";
            $Page_Description = "";
            $Page_Image = "";
        }
    }
    MetaDataInSmarty($smarty,  $Page_Header, $Page_Title, $Page_Description, $Page_Image);
}

function MetaDataInSmarty($smarty,  $Page_Header, $Page_Title, $Page_Description, $Page_Image)
{
    $Page_Header = $Page_Header ? $Page_Header : null;
    $Page_Title = $Page_Title ? $Page_Title : null;
    $Page_Description = $Page_Description ? $Page_Description : null;
    $Page_URL = "";
    $Page_Image = $Page_Image ? $Page_Image : null;

    $smarty->assign('Page_Header', $Page_Header);
    $smarty->assign('Page_Title', $Page_Title);
    $smarty->assign('Page_Description', $Page_Description);
    $smarty->assign('Page_URL',  $Page_URL);
    $smarty->assign('Page_Image', $Page_Image);
}

LoadMetaData($smarty);

function Page404()
{
    redirect('/404');
}
