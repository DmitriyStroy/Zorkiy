<?

function GetAllProducts()
{
    $sql = "SELECT `Model_ID`, CONCAT(`manufacturer`.`M_Name`,' ',`model`.`Model_Name`) AS `ProductName`,
    `Model_OldPrice`,`Model_Price`,`Model_Status`
    FROM `model`
    INNER JOIN  `manufacturer` ON `manufacturer`.`M_ID`=`model`.`Model_Manufacturer`
    ORDER BY `Model_ID` DESC";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}

function GetAllLastProducts($limit = null)
{
    $sql = "SELECT `Model_ID`, CONCAT(`M_Name`,' ',`Model_Name`) AS `ProductName`, `Model_Price`, `DP_Image`
    FROM `model`
    INNER JOIN `manufacturer` ON `M_ID`=`Model_Manufacturer` 
    INNER JOIN `device_picture` ON `DP_Device`=`Model_ID`
    WHERE `DP_Main`=1
    ORDER BY `Model_ID` DESC";
    if ($limit) {
        $sql .= " LIMIT {$limit}";
    }
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    return createSmartyRsArray($rs);
}

function GetAllProductsByKeyTypeDevice($TypeDevice_ID)
{
    $TD_ID = intval($TypeDevice_ID);
    $sql = "SELECT `Model_ID`, 
    CONCAT(`M_Name`,' ',`Model_Name`) AS `ProductName`, 
    `Model_Price`, 
    `DP_Image` 
    FROM `model` 
    INNER JOIN `manufacturer` ON `M_ID`=`Model_Manufacturer` 
    INNER JOIN `device_picture` ON `DP_Device`=`Model_ID` 
    INNER JOIN `type_device` ON `type_device`.`TD_ID`=`manufacturer`.`M_TD` 
    WHERE `DP_Main` = '1' AND `Type_Device`.`TD_ID` = '{$TD_ID}'";   //Сменить на название

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    return createSmartyRsArray($rs);
}

function GetAllProductsByURL($URL)
{
    $TD_URL = $URL;
    $sql = "SELECT `Model_ID`, 
    CONCAT(`M_Name`,' ',`Model_Name`) AS `ProductName`, 
    `Model_Price`, `Model_OldPrice`,
    `DP_Image`, `product_status`.`PS_Name` 
    FROM `model` 
    INNER JOIN `manufacturer` ON `M_ID`=`Model_Manufacturer` 
    INNER JOIN `device_picture` ON `DP_Device`=`Model_ID` 
    INNER JOIN `type_device` ON `type_device`.`TD_ID`=`manufacturer`.`M_TD` 
    INNER JOIN `product_status` ON `product_status`.`PS_ID`=`model`.`Model_Status`
    WHERE `DP_Main` = '1' AND `type_device`.`TD_URL` = '{$TD_URL}'";   //Сменить на название


    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    $smartyRS = array();

    while ($row = mysqli_fetch_assoc($rs)) {
        $rsRating = GetCountRatingByProduct($row['Model_ID'])['Rating'];
        if ($rsRating) {
            $row['Rating'] = $rsRating;
        }

        $rsAverageRating = GetAverageRatingByProduct($row['Model_ID'])['RatintDevice'];
        if ($rsAverageRating) {
            $row['AverageRating'] = $rsAverageRating;
        }

        $smartyRS[] = $row;
    }
    return $smartyRS;
}

function GetProductByProductID($ProductID)
{
    $sql = "SELECT `Model_ID`, `Model_Manufacturer`, `Model_Name`, `Model_OldPrice`, `Model_Price`, `Model_Status`, `Model_Сharacteristic`
    FROM `model`
    WHERE `Model_ID`='{$ProductID}'";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs)[0];
}

function GetProductById($ProductID)
{
    $sql = "SELECT `model`.`Model_ID`, `manufacturer`.`M_Name`, `model`.`Model_Name`, `model`.`Model_Сharacteristic`, `model`.`Model_Price`
    FROM `model`
    INNER JOIN `manufacturer` ON `manufacturer`.`M_ID`=`model`.`Model_Manufacturer`
    WHERE `model`.`Model_ID`='{$ProductID}'";

    $query = mysqli_query($GLOBALS['ConnetDB'], $sql);

    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $rsProducts = GetAllDevicePictureByID($row['Model_ID']);
        if ($rsProducts) {
            $row['Picture'] = $rsProducts;
            $smartyRs[] = $row;
        }
    }
    return $smartyRs[0];
}

function GetProductNameById($Prod_ID)
{
    $sql = "SELECT `Model_ID`, 
    CONCAT(`manufacturer`.`M_Name`,' ',`model`.`Model_Name`) AS `ProductName`, `DP_Image`
    FROM `model` 
    INNER JOIN `manufacturer` ON `manufacturer`.`M_ID`=`model`.`Model_Manufacturer`
    INNER JOIN `device_picture` ON `DP_Device`=`Model_ID`
    WHERE `DP_Main` = '1' AND `Model_ID`='{$Prod_ID}'";

    $query = mysqli_query($GLOBALS['ConnetDB'], $sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function GetProductsFromArray($itemIds)
{
    if ($itemIds != array()) {
        $StrItemIds = implode(', ', $itemIds);

        $sql = "SELECT `Model_ID`, CONCAT(`manufacturer`.`M_Name`,' ',`model`.`Model_Name`) AS `ProductName`, `Model_Price`
    FROM `model` 
    INNER JOIN `manufacturer` ON `manufacturer`.`M_ID`=`model`.`Model_Manufacturer`
    WHERE `Model_ID` in ({$StrItemIds})";

        $query = mysqli_query($GLOBALS['ConnetDB'], $sql);
        return createSmartyRsArray($query);
    }
    return false;
}

function CreateProduct($ManufacturerProduct, $ModelName, $ProductPrice, $ProductStatus)
{
    $sql = "INSERT INTO `model`(`Model_Manufacturer`, `Model_Name`, `Model_OldPrice`, `Model_Price`, `Model_Status`) 
        VALUES ('{$ManufacturerProduct}', '{$ModelName}', NULL, '{$ProductPrice}','{$ProductStatus}')";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}

function FastUpdateProduct($Model_ID, $Model_OldPrice, $Model_Price, $Model_Status)
{
    $sql = "UPDATE `model` SET 
    `Model_OldPrice`='{$Model_OldPrice}',
    `Model_Price`='{$Model_Price}',
    `Model_Status`='{$Model_Status}' 
    WHERE `Model_ID` = '{$Model_ID}'";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}

function UpdateProduct($Model_ID, $Model_Manufacturer, $Model_Name, $Model_Сharacteristic, $Model_OldPrice, $Model_Price, $Model_Status)
{
    $sql = "UPDATE `model` SET 
    `Model_Manufacturer`='{$Model_Manufacturer}',
    `Model_Name`='{$Model_Name}',
    `Model_Сharacteristic` ='{$Model_Сharacteristic}',
    `Model_OldPrice`='{$Model_OldPrice}',
    `Model_Price`='{$Model_Price}',
    `Model_Status`='{$Model_Status}'    
    WHERE `Model_ID` = '{$Model_ID}'";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}
