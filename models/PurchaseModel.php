<?

function setPurchaseForOrder($orderId, $cart)
{
    $sql = "INSERT INTO `purchase`(`Purchase_Checkut`, `Purchase_Product`, `Purchase_Amount`, `Purchase_Price`) 
    VALUES ";

    $values = array();
    foreach ($cart as $item) {
        $values[] = "('{$orderId}', {$item['Model_ID']}, {$item['cnt']}, {$item['Model_Price']})";
    }

    $sql .= implode(', ', $values);
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    return $rs;
}

function GetPurchaseForOrder($OrderID)
{
    $sql = "SELECT `purchase`.*, CONCAT(`manufacturer`.`M_Name`,' ',`model`.`Model_Name`) AS `ProductName`
    FROM `purchase` 
    INNER JOIN `model` ON `model`.`Model_ID`=`purchase`.`Purchase_Product`
    INNER JOIN `manufacturer` ON `manufacturer`.`M_ID`=`model`.`Model_Manufacturer`
    WHERE `Purchase_Checkut` = {$OrderID}";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}
