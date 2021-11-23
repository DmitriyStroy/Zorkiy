<?

include_once '../models/CategoryModel.php';
include_once '../models/CharacteristicsModel.php';
include_once '../models/CheckoutModel.php';
include_once '../models/Device_ReviewsModel.php';
include_once '../models/DevicePictureModel.php';
include_once '../models/ManufacturerModel.php';
include_once '../models/NewsModel.php';
include_once '../models/PaymentModel.php';
include_once '../models/DeliveryMethodModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/PurchaseModel.php';
include_once '../models/SettingPagesModel.php';
include_once '../models/TypeDeviceModel.php';
include_once '../models/UsersModel.php';
include_once '../models/OrderStatusModel.php';
include_once '../models/PostalServicesModel.php';
include_once '../models/StoreAddressesModel.php';
include_once '../models/ProductStatusModel.php';
include_once '../models/FeedbackModel.php';
include_once '../models/OfferModel.php';


$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemplateAdminWebPath);

/*

    Main Index

*/
function indexAction($smarty)
{
    $smarty->assign('Page_Header', "Управление сайтом");
    $smarty->assign('Page_Title', "Управление сайтом");
    $smarty->assign('Page_Description', "Управление сайтом");
    $smarty->assign('Page_URL',  "");
    $smarty->assign('Page_Image', "");

    if (isset($_GET['id']) and $_GET['id'] == 'categories') {
        CategoriesAction($smarty);
    } else if (isset($_GET['id']) and $_GET['id'] == 'typedevice') {
        TypeDeviceAction($smarty);
    } else if (isset($_GET['id']) and $_GET['id'] == 'manufacturer') {
        ManufacturerAction($smarty);
    } else if (isset($_GET['id']) and $_GET['id'] == 'products') {
        ProductsAction($smarty);
    } else if (isset($_GET['id']) and $_GET['id'] == 'orders') {
        OrdersAction($smarty);
    } else if (isset($_GET['id']) and $_GET['id'] == 'news') {
        NewsAction($smarty);
    } else if (isset($_GET['id']) and $_GET['id'] == 'offer') {
        OfferAction($smarty);
    } else if (isset($_GET['id']) and $_GET['id'] == 'feedback') {
        FeedBackAction($smarty);
    } else {
        loadTemplate($smarty, 'adminHeader');
        loadTemplate($smarty, 'admin');
        loadTemplate($smarty, 'adminFooter');
    }
}

/* 

    Function Web-Control 

*/
function OfferAction($smarty)
{
    $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();
    $smarty->assign('MenuCategory', $MenuCategory);


    $GetAllOffer = GetAllOffer();
    $smarty->assign('GetAllOffer', $GetAllOffer);

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminOffer');
    loadTemplate($smarty, 'adminFooter');
}

function FeedBackAction($smarty)
{
    $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();
    $smarty->assign('MenuCategory', $MenuCategory);

    $AllFeedBack = GetAllFeedBack();
    $smarty->assign('AllFeedBack', $AllFeedBack);

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminFeedBack');
    loadTemplate($smarty, 'adminFooter');
}

function OrdersAction($smarty)
{
    if ((isset($_GET['action']) and isset($_GET['id']))) {

        $DataOrders = GetOrderById($_GET['id']);
        $smarty->assign('DataOrders', $DataOrders);

        $status = GetAllStatus();
        $smarty->assign('status', $status);

        $PSandDM = GetPostalServicesAndDeliveryMethod();
        $smarty->assign('PSandDM', $PSandDM);

        $store = GetAllStore();
        $smarty->assign('store', $store);

        $PayMeth = GetPaymentMethod();
        $smarty->assign('PayMeth', $PayMeth);

        loadTemplate($smarty, 'adminHeader');
        loadTemplate($smarty, 'adminOrder');
        loadTemplate($smarty, 'adminFooter');
    } else {
        $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();
        $OrdStatus = GetAllStatus();
        $smarty->assign('OrdStatus', $OrdStatus);

        $Orders = GetAllOrders();

        $smarty->assign('MenuCategory', $MenuCategory);
        $smarty->assign('DataOrders', $Orders);

        loadTemplate($smarty, 'adminHeader');
        loadTemplate($smarty, 'adminOrders');
        loadTemplate($smarty, 'adminFooter');
    }
}

function CategoriesAction($smarty)
{
    $AllCategories = GetAllCategory();
    $smarty->assign('AllCategories', $AllCategories);

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminCategories');
    loadTemplate($smarty, 'adminFooter');
}

function TypeDeviceAction($smarty)
{
    $AllCategories = GetAllCategory();
    $smarty->assign('AllCategories', $AllCategories);

    $AllTypeDevice = GetAllTypeDevice();
    $smarty->assign('AllTypeDevice', $AllTypeDevice);





    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminTypeDevice');
    loadTemplate($smarty, 'adminFooter');
}

function ManufacturerAction($smarty)
{
    $CategoriesAndTypeDevice = GetAllCategoryAndTypeDevice();
    $smarty->assign('CategoriesAndTypeDevice', $CategoriesAndTypeDevice);

    $AllManufacturer = GetAllManufacturer();
    $smarty->assign('AllManufacturer', $AllManufacturer);

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminManufacturer');
    loadTemplate($smarty, 'adminFooter');
}

function ProductsAction($smarty)
{
    loadTemplate($smarty, 'adminHeader');
    if ((isset($_GET['action']) and isset($_GET['id']))) {
        $AllProductStatus = GetAllProductStatus();
        $smarty->assign('AllProductStatus', $AllProductStatus);

        $AllTypeDeviceANDManufacturer = GetAllTypeDeviceANDManufacturer();
        $smarty->assign('AllTypeDeviceANDManufacturer', $AllTypeDeviceANDManufacturer);

        $Products = GetProductByProductID($_GET['id']);
        $smarty->assign('Products', $Products);
       
        $ProductPhoto = GetAllDevicePictureByID($_GET['id']);
        $smarty->assign('ProductPhoto', $ProductPhoto);

        loadTemplate($smarty, 'adminProduct');
    } else {
        $AllProductStatus = GetAllProductStatus();
        $smarty->assign('AllProductStatus', $AllProductStatus);

        $AllTypeDeviceANDManufacturer = GetAllTypeDeviceANDManufacturer();
        $smarty->assign('AllTypeDeviceANDManufacturer', $AllTypeDeviceANDManufacturer);

        $AllProducts = GetAllProducts();
        $smarty->assign('AllProducts', $AllProducts);

        loadTemplate($smarty, 'adminProducts');
    }
    loadTemplate($smarty, 'adminFooter');
}

function NewsAction($smarty)
{
    $AllNews = GetAllNews();
    $smarty->assign('AllNews', $AllNews);

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminNews');
    loadTemplate($smarty, 'adminFooter');
}

/*

    Control Category

*/
function CategoryCreateAction()
{
    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 203) {

        $Category_Name_UA = check_correctness_string($_REQUEST['CategoryNameUA']);
        $Category_Name_RU = check_correctness_string($_REQUEST['CaterotyNameRU']);
        $Category_URL = check_correctness_string($_REQUEST['CategoryURL']);

        $res = SetNewCategory($Category_Name_UA, $Category_Name_RU, $Category_URL);

        if (!$res) {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка создания категории';
            echo json_encode($resData);
            return;
        }
        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Категория добавлена';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка добавления категории';
        }
        echo json_encode($resData);
    }
}
function CategoryUpdateAction()
{
    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 201) {
        $Category_ID = check_correctness_string($_REQUEST['Category_ID']);
        $Category_Name_UA = check_correctness_string($_REQUEST['Category_Name_UA']);
        $Category_Name_RU = check_correctness_string($_REQUEST['Category_Name_RU']);
        $Category_URL = check_correctness_string($_REQUEST['Category_URL']);
        $Category_Enable = check_correctness_string($_REQUEST['Category_Enable']);

        $res = UpdateCategoryById($Category_ID, $Category_Name_UA, $Category_Name_RU, $Category_URL, $Category_Enable);
        if (!$res) {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка обновления категории';
            echo json_encode($resData);
            return;
        }
        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Категория обновлена';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка обновления категории';
        }
        echo json_encode($resData);
    }
}

/*

    Control TypeDevice

*/
function CreateTypeDeviceAction()
{
    if (!isset($_REQUEST['TypeDeviceNameRU']) and !isset($_REQUEST['TypeDeviceCategory'])) {
        redirect('/');
    }

    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 203) {

        $TypeDeviceNameUA = check_correctness_string($_REQUEST['TypeDeviceNameUA']);
        $TypeDeviceNameRU = check_correctness_string($_REQUEST['TypeDeviceNameRU']);
        $TypeDeviceCategory = check_correctness_string($_REQUEST['TypeDeviceCategory']);
        $TypeDeviceImage = check_correctness_string($_REQUEST['TypeDeviceImage']);
        $TypeDeviceURL = check_correctness_string($_REQUEST['TypeDeviceURL']);
        $TypeDeviceEnable = check_correctness_string($_REQUEST['TypeDeviceEnable']);

        $res = SetTypeDevice($TypeDeviceNameUA, $TypeDeviceNameRU, $TypeDeviceCategory, $TypeDeviceImage, $TypeDeviceURL, $TypeDeviceEnable);

        if (!$res) {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка создания типа устройств';
            echo json_encode($resData);
            return;
        }
        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Тип устройств добавлен';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка добавления типа устройств';
        }
        echo json_encode($resData);
    }
}
function UpdateTypeDeviceAction()
{
    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 201) {
        $TD_ID = check_correctness_string($_REQUEST['TD_ID']);
        $TD_Name_UA = check_correctness_string($_REQUEST['TD_Name_UA']);
        $TD_Name_RU = check_correctness_string($_REQUEST['TD_Name_RU']);
        $TD_Category = check_correctness_string($_REQUEST['TD_Category']);
        $TD_Image = check_correctness_string($_REQUEST['TD_Image']);
        $TD_URL = check_correctness_string($_REQUEST['TD_URL']);
        $TD_Enable = check_correctness_string($_REQUEST['TD_Enable']);


        $res = UpdateTypeDeviceById($TD_ID, $TD_Name_UA, $TD_Name_RU, $TD_Category, $TD_Image, $TD_URL, $TD_Enable);
        if (!$res) {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка обновления типа устройств';
            echo json_encode($resData);
            return;
        }
        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Тип устройств обновлен';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка обновления типа устройств';
        }
        echo json_encode($resData);
    }
}

/*

    Control Manufacturer

*/
function CreateManufacturerAction()
{
    if (!isset($_REQUEST['ManufacturerCategory']) and !isset($_REQUEST['ManufacturerName'])) {
        redirect('/404/');
    }

    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 203) {

        $ManufacturerCategory = check_correctness_string($_REQUEST['ManufacturerCategory']);
        $ManufacturerName = check_correctness_string($_REQUEST['ManufacturerName']);

        $res = CreateManufacturer($ManufacturerCategory, $ManufacturerName);

        if (!$res) {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка создания заказа';
            echo json_encode($resData);
            return;
        }
        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Категория добавлена';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка добавления категории';
        }
        echo json_encode($resData);
    }
}
function UpdateManufacturerAction()
{
    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 201) {
        $M_ID = check_correctness_string($_REQUEST['M_ID']);
        $M_TD = check_correctness_string($_REQUEST['M_TD']);
        $M_Name = check_correctness_string($_REQUEST['M_Name']);

        $res = UpdateManufacturerById($M_ID, $M_TD, $M_Name);
        if (!$res) {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка обновления производителя';
            echo json_encode($resData);
            return;
        }
        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Производитель обновлен';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка обновления производителя';
        }
        echo json_encode($resData);
    }
}

/*

    Control Product

*/
function CreateProductAction()
{
    if (
        !isset($_REQUEST['ManufacturerProduct']) and
        !isset($_REQUEST['ModelName']) and
        !isset($_REQUEST['ProductPrice']) and
        !isset($_REQUEST['ProductStatus'])
    ) {
        redirect('/404/');
    }

    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 203) {

        $ManufacturerProduct = check_correctness_string($_REQUEST['ManufacturerProduct']);
        $ModelName = check_correctness_string($_REQUEST['ModelName']);
        $ProductPrice = check_correctness_string($_REQUEST['ProductPrice']);
        $ProductStatus = check_correctness_string($_REQUEST['ProductStatus']);

        $res = CreateProduct($ManufacturerProduct, $ModelName, $ProductPrice, $ProductStatus);

        if (!$res) {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка создания продукта';
            echo json_encode($resData);
            return;
        }
        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Продукт добавлен';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка добавления продукта';
        }
        echo json_encode($resData);
    }
}

function FastUpdateProductrAction()
{
    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 201) {
        $Model_ID = check_correctness_string($_REQUEST['Model_ID']);
        $Model_OldPrice = check_correctness_string($_REQUEST['Model_OldPrice']);
        $Model_Price = check_correctness_string($_REQUEST['Model_Price']);
        $Model_Status = check_correctness_string($_REQUEST['Model_Status']);

        $res = FastUpdateProduct($Model_ID, $Model_OldPrice, $Model_Price, $Model_Status);
        if (!$res) {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка обновления производителя';
            echo json_encode($resData);
            return;
        }
        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Производитель обновлен';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка обновления производителя';
        }
        echo json_encode($resData);
    }
}

function UpdateProductAction()
{
    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 201) {
        $Model_ID = check_correctness_string($_REQUEST['Model_ID']);
        $Model_Manufacturer = check_correctness_string($_REQUEST['Model_Manufacturer']);
        $Model_Name = check_correctness_string($_REQUEST['Model_Name']);
        $Model_Сharacteristic = $_REQUEST['Model_Сharacteristic'];
        $Model_OldPrice = $_REQUEST['Model_OldPrice'];
        $Model_Price = $_REQUEST['Model_Price'];
        $Model_Status = check_correctness_string($_REQUEST['Model_Status']);

        $res = UpdateProduct($Model_ID, $Model_Manufacturer, $Model_Name, $Model_Сharacteristic, $Model_OldPrice, $Model_Price, $Model_Status);
        if (!$res) {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка обновления производителя';
            echo json_encode($resData);
            return;
        }
        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Производитель обновлен';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка обновления производителя';
        }
        echo json_encode($resData);
    }
}
function UpdateMainImageProductAction()
{
    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 201) {
        $Picture_ID = check_correctness_string($_REQUEST['Picture_ID']);
        $DP_Device = check_correctness_string($_REQUEST['DP_Device']);        

        $res = UpdateMainPictureByID($Picture_ID, $DP_Device);
        if (!$res) {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка обновления главного изображения';
            echo json_encode($resData);
            return;
        }
        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Главное изображение выбрано';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка обновления главного изображения';
        }
        echo json_encode($resData);
    }
}
function UploadAction()
{
    $maxsize = 2 * 1024 * 1024;

    
    $ProductID = $_POST['Model_ID'];
 /*
    $ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
    
    
    $newFileName = $ProductID . '.' . $ext;*/
    if ($_FILES["filename"]["size"] > $maxsize){
        echo ("Размер файла превышает 2 мегабайта");
        return;
    }
    $FileName = $_FILES['filename']['name'];

    
    if (is_uploaded_file($_FILES['filename']['tmp_name'])){
        //d($_SERVER['DOCUMENT_ROOT'].'/templates/default/images/products/'.$ProductID.'/'.$FileName);
        $res = move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/templates/default/images/products/'.$ProductID.'/'.$FileName);
        if ($res){
            $res = AddDevicePictureByID($ProductID, $FileName);
            if ($res){
                redirect('/admin/products/'.$ProductID);
            }
        }
    }
    else{
        echo ("Ошибка загрузки файла");
    }
}
