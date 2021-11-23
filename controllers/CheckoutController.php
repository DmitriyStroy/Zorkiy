<?

include_once '../models/CategoryModel.php';         //category device
include_once '../models/TypeDeviceModel.php';       // type device
include_once '../models/ManufacturerModel.php';     // manufacturer device
include_once '../models/ProductsModel.php';         // model device
include_once '../models/PaymentModel.php';         // model payment_method
include_once '../models/CheckoutModel.php';         // model Checkout
include_once '../models/PurchaseModel.php';         // model Purchase
include_once '../models/DeliveryMethodModel.php';
include_once '../models/PostalServicesModel.php';
include_once '../models/StoreAddressesModel.php';


function IndexAction($smarty)
{
    $met = isset($_GET['id']) ? $_GET['id'] : null;

    if ($met == 'save') {
        if (isset($_POST['Surname'])) {
            saveorderAction();
        } else {
            redirect('/orders/');
        }
    } else {
        $itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;

        if (!$itemIds) {
            redirect('/');
            return;
        }
        $itemsCnt = array();
        foreach ($itemIds as $item) {
            $postVar = 'itemCnt_' . $item;
            $itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
        }
        $rsProducts = GetProductsFromArray($itemIds);

        $i = 0;
        foreach ($rsProducts as &$item) {
            $item['cnt'] = isset($itemsCnt[$item['Model_ID']]) ? $itemsCnt[$item['Model_ID']] : 0;
            if ($item['cnt']) {
                $item['RealPrice'] = $item['cnt'] * $item['Model_Price'];
            } else {
                unset($rsProducts[$i]);
            }
            $i++;
        }

        if (!$rsProducts) {
            echo "Корзина пуста";
            return;
        }

        $_SESSION['saleCart'] = $rsProducts;


        if (!isset($_SESSION['user'])) {
            $smarty->assign('hideLoginBox', 1);
        }


        $PSandDM = GetPostalServicesAndDeliveryMethod();
        $smarty->assign('PSandDM', $PSandDM);

        $PayMeth = GetPaymentMethod();
        $smarty->assign('PayMeth', $PayMeth);

        $store = GetAllStore();
        $smarty->assign('store', $store);

        $MenuCategory = GetAllCategoryAndThemTypeDeviceRU();

        $smarty->assign('MenuCategory', $MenuCategory);
        $smarty->assign('rsProducts', $rsProducts);
        loadTemplate($smarty, 'header');
        loadTemplate($smarty, 'checkout');
        loadTemplate($smarty, 'footer');
    }
}

function saveorderAction()
{
    $cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;

    if (!$cart) {
        $resData['success'] = 0;
        $resData['message'] = 'Нет товара для заказа';
        echo json_encode($resData);
        return;
    }

    $Surname = $_POST['Surname'];
    $Name = $_POST['Name'];
    $Patronymic = $_POST['Patronymic'];
    $Phone = $_POST['Phone'];
    $OurStore = $_POST['OurStore'];
    $Branch = $_POST['Branch'];
    if (isset($Branch)) {
        $City = $_POST['PO_City'];
    } else {
        $City = $_POST['City'];
    }
    $Street = $_POST['Street'];
    $House = $_POST['House'];
    $Apartment = $_POST['Apartment'];
    $Delivery_method = $_POST['Delivery_method'];
    $Payment_method = $_POST['Payment_method'];
    $Comment = $_POST['Comment'];


    if ($Surname == null or $Name == null or $Patronymic == null or $Phone == null) {
        $resData['success'] = 0;
        $resData['message'] = 'Заполните все поля';
        echo json_encode($resData);
        return;
    }

    $orderID = makeNewOrder(
        $Surname,
        $Name,
        $Patronymic,
        $Phone,
        $Payment_method,
        $Delivery_method,
        $OurStore,
        $City,
        $Street,
        $House,
        $Apartment,
        $Branch,
        $Comment
    );

    if (!$orderID) {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка создания заказа';
        echo json_encode($resData);
        return;
    }

    $res = setPurchaseForOrder($orderID, $cart);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Заказ принят';
        unset($_SESSION['saleCart']);
        unset($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка внесения данных для заказа № ' . $orderID;
    }
    echo json_encode($resData);
}


function confirmAction()
{
    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 354) {
        $resData = array();
        $_order = check_correctness_string($_REQUEST['OrderId'] ? $_REQUEST['OrderId'] : null);

        $res = Confirm($_order);


        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Оплата подтверждена';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка подтверждения оплаты';
        }
        echo json_encode($resData);
    }
}

function UpdateStatusAction()
{
    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 201) {
        $resData = array();
        $_order = check_correctness_string($_REQUEST['OrderId'] ? $_REQUEST['OrderId'] : null);
        $_status = check_correctness_string($_REQUEST['ControlStatus'] ? $_REQUEST['ControlStatus'] : null);


        $res = UpdateStatusOrder($_order, $_status);


        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Статус изменен';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка сохранения статуса';
        }
        echo json_encode($resData);
    }
}

function OrderUserInfoAction()
{
    $ID = isset($_GET['id']) ? $_GET['id'] : null;
    if ($ID == 202) {
        $resData = array();

        $_order = check_correctness_string($_REQUEST['OrderId'] ? $_REQUEST['OrderId'] : null);
        $_surname = check_correctness_string($_REQUEST['Surname'] ? $_REQUEST['Surname'] : null);
        $_name = check_correctness_string($_REQUEST['Name'] ? $_REQUEST['Name'] : null);
        $_patronymic = check_correctness_string($_REQUEST['Patronymic'] ? $_REQUEST['Patronymic'] : null);
        $_phone = check_correctness_string($_REQUEST['Phone'] ? $_REQUEST['Phone'] : null);

        $res = UpdateUserInfo($_order, $_surname, $_name, $_patronymic, $_phone);


        if ($res) {
            $resData['success'] = 1;
            $resData['message'] = 'Статус изменен';
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка сохранения данных';
        }
        echo json_encode($resData);
    }
}
