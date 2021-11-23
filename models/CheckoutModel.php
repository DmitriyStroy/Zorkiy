<?


function GetUserOrders($UserEmail)
{
    $sql = "SELECT `Checkout_ID`,
    `Checkout_Surname`, `Checkout_Name`, `Checkout_Patronymic`, 
    `Checkout_Phone`, `Checkout_Payment_method`, `payment_method`.`PM_Name`, `delivery_method`.`DM_Name`, 
    `Checkout_City`, `Checkout_Branch`, `Checkout_Street`, `Checkout_House`, 
    `Checkout_Apartment`, `Checkout_Comment`, `orders_status`.`OS_Name`, `orders_status`.`OS_Color`, 
    `Checkout_Date`, `Checkout_Date_Modification`, `Checkout_DateOfPayment`
    FROM `checkout` 
    INNER JOIN `users` ON `users`.`Id_User` = `checkout`.`Checkout_User`
    INNER JOIN `payment_method` ON `payment_method`.`PM_ID`=`checkout`.`Checkout_Payment_method`
    INNER JOIN `delivery_method` ON `delivery_method`.`DM_ID`=`checkout`.`Checkout_Delivery_method`
    INNER JOIN `orders_status` ON `orders_status`.`OS_ID`=`checkout`.`Checkout_Status`
    WHERE `users`.`U_Login` = '{$UserEmail}'
    ORDER BY `Checkout_ID` DESC";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)) {
        $rsProducts = GetPurchaseForOrder($row['Checkout_ID']);
        if ($rsProducts) {
            $row['Product'] = $rsProducts;
            $smartyRs[] = $row;
        }
    }

    return $smartyRs;
}

function GetOrderById($OrdersId)
{
    $sql = "SELECT `Checkout_ID`,
    `Checkout_Surname`, `Checkout_Name`, `Checkout_Patronymic`, 
    `Checkout_Phone`, `Checkout_Payment_method`, `payment_method`.`PM_Name`, `Checkout_Delivery_method`,  `delivery_method`.`DM_Name`, 
    `Checkout_City`, `Checkout_Branch`, `Checkout_Street`, `Checkout_House`, 
    `Checkout_Apartment`, `Checkout_Comment`, `Checkout_Status`, `orders_status`.`OS_Name`, `orders_status`.`OS_Color`, 
    `Checkout_Date`, `Checkout_Date_Modification`, `Checkout_DateOfPayment`
    FROM `checkout` 
    INNER JOIN `users` ON `users`.`Id_User` = `checkout`.`Checkout_User`
    INNER JOIN `payment_method` ON `payment_method`.`PM_ID`=`checkout`.`Checkout_Payment_method`
    INNER JOIN `delivery_method` ON `delivery_method`.`DM_ID`=`checkout`.`Checkout_Delivery_method`
    INNER JOIN `orders_status` ON `orders_status`.`OS_ID`=`checkout`.`Checkout_Status`
    WHERE `Checkout_ID` = '{$OrdersId}'
    ORDER BY `Checkout_ID` DESC";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)) {
        $rsProducts = GetPurchaseForOrder($row['Checkout_ID']);
        if ($rsProducts) {
            $row['Product'] = $rsProducts;
            $smartyRs[] = $row;
        }
    }

    return $smartyRs;
}

function GetAllOrders()
{
    $sql = "SELECT `Checkout_ID`,
    `Checkout_Surname`, `Checkout_Name`, `Checkout_Patronymic`, 
    `Checkout_Phone`, `payment_method`.`PM_Name`, `delivery_method`.`DM_Name`, 
    `Checkout_City`, `Checkout_Branch`, `Checkout_Street`, `Checkout_House`, 
    `Checkout_Apartment`, `Checkout_Comment`, `orders_status`.`OS_Name`, `orders_status`.`OS_Color`, 
    `Checkout_Date`, `Checkout_Date_Modification`, `Checkout_DateOfPayment`
    FROM `checkout` 
    INNER JOIN `users` ON `users`.`Id_User` = `checkout`.`Checkout_User`
    INNER JOIN `payment_method` ON `payment_method`.`PM_ID`=`checkout`.`Checkout_Payment_method`
    INNER JOIN `delivery_method` ON `delivery_method`.`DM_ID`=`checkout`.`Checkout_Delivery_method`
    INNER JOIN `orders_status` ON `orders_status`.`OS_ID`=`checkout`.`Checkout_Status`
    WHERE `orders_status`.`OS_ID` <> (SELECT MAX(`OS_ID`) FROM `orders_status`)
    ORDER BY `Checkout_ID` DESC";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)) {
        $rsProducts = GetPurchaseForOrder($row['Checkout_ID']);
        if ($rsProducts) {
            $row['Product'] = $rsProducts;
            $smartyRs[] = $row;
        }
    }

    return $smartyRs;
}

function makeNewOrder(
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
) {
    $userId = $_SESSION['user']['Id_User'];
    $userIP = $_SERVER['REMOTE_ADDR'];  //Сделать коректнее

    $_Surname = check_correctness_string($Surname);
    $_Name = check_correctness_string($Name);
    $_Patronymic = check_correctness_string($Patronymic);
    $_Phone = check_correctness_string($Phone);

    $_Payment_method = check_correctness_string($Payment_method);
    $_Delivery_method = check_correctness_string($Delivery_method);
    $_OurStore = check_correctness_string($OurStore);

    $_City = check_correctness_string($City);
    $_Street = check_correctness_string($Street);
    $_House = check_correctness_string($House);
    $_Apartment = check_correctness_string($Apartment);
    $_Branch = check_correctness_string($Branch);

    $_Comment = check_correctness_string($Comment);

    $guid = createSmartyRsArray(mysqli_query($GLOBALS['ConnetDB'], "SELECT uuid() AS 'GUID'"))[0]['GUID'];


    $sql = "INSERT INTO `checkout` (`Checkout_ID`, `Checkout_User`, `Checkout_Surname`, `Checkout_Name`, `Checkout_Patronymic`, `Checkout_Phone`, `Checkout_Payment_method`, `Checkout_Delivery_method`, `Checkout_Store`, `Checkout_City`, `Checkout_Branch`, `Checkout_Street`, `Checkout_House`, `Checkout_Apartment`, `Checkout_Comment`, `Checkout_Status`, `Checkout_Date`, `Checkout_Date_Modification`, `Checkout_DateOfPayment`, `Checkout_IP`, `Checkout_GUID`) 
    VALUES (NULL, '{$userId}', '{$_Surname}', '{$_Name}', '{$_Patronymic}', '{$_Phone}', 
    '{$_Payment_method}', '{$_Delivery_method}', '{$_OurStore}', '{$_City}', '{$_Branch}', 
    '{$_Street}', '{$_House}', '{$_Apartment}', '{$_Comment}', '1', CURRENT_TIMESTAMP, 
    CURRENT_TIMESTAMP, NULL, '{$userIP}', '{$guid}');";


    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    if ($rs) {
        $sql = "SELECT `Checkout_ID` FROM `checkout` WHERE `Checkout_GUID` = '{$guid}' LIMIT 1";
        $rs = createSmartyRsArray(mysqli_query($GLOBALS['ConnetDB'], $sql));

        if (isset($rs[0])) {
            return $rs[0]['Checkout_ID'];
        }
    }
    return false;
}


function UpdateStatusOrder($Orders, $Status)
{
    $sql = "UPDATE `checkout` SET `Checkout_Status`= '{$Status}' WHERE `Checkout_ID` = '{$Orders}'";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}

function Confirm($Orders)
{
    $sql = "UPDATE `checkout` SET `Checkout_DateOfPayment`= CURRENT_TIMESTAMP WHERE `Checkout_ID` = '{$Orders}'";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}

function UpdateUserInfo($order, $surname, $name, $patronymic, $phone)
{
    $sql = "UPDATE `checkout` 
    SET 
    `Checkout_Surname`= '{$surname}',
    `Checkout_Name`= '{$name}',
    `Checkout_Patronymic`= '{$patronymic}',
    `Checkout_Phone`= '{$phone}'
    WHERE `Checkout_ID` = '{$order}'";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}
