<?

function GetAllTypeDevice()
{
    $sql = "SELECT *
    FROM `type_device` 
    INNER JOIN `category` ON `Category_ID`=`TD_Category`   
    ORDER BY `TD_ID`";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}

function GetAllTypeDeviceRU()
{
    $sql = "SELECT `TD_ID`,`TD_Name_RU`,`TD_URL`, `TD_Image`, `Category_Name_RU`
    FROM `type_device` 
    INNER JOIN `category` ON `Category_ID`=`TD_Category`  
    WHERE `TD_Enable` <> 0 
    ORDER BY `TD_Name_RU`";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    return createSmartyRsArray($rs);
}

function GetTypeDeviceByCategory($Category_ID)
{
    $sql = "SELECT `TD_ID`, `TD_Name_UA`, `TD_Name_RU`, `TD_Category`, `TD_Image`, `TD_URL` 
    FROM `type_device` 
    INNER JOIN `category` ON `category`.`Category_ID`=`type_device`.`TD_Category`
    WHERE `category`.`Category_ID`='{$Category_ID}'";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    return createSmartyRsArray($rs);
}

function GetTypeDeviceByKeyCategoryRU($Category_ID)
{
    $sql = "SELECT `TD_ID`, `TD_Name_UA`, `TD_Name_RU`, `TD_Category`, `TD_Image`, `TD_URL` 
    FROM `type_device` 
    INNER JOIN `category` ON `category`.`Category_ID`=`type_device`.`TD_Category`
    WHERE `TD_Enable` <> 0 AND `category`.`Category_ID`='{$Category_ID}'";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    return createSmartyRsArray($rs);
}

function GetTypeDeviceByURLCategoryRU($Category_URL)
{
    $sql = "SELECT `TD_ID`, `TD_Name_UA`, `TD_Name_RU`, `TD_Category`, `TD_Image`, `TD_URL` 
    FROM `type_device` 
    INNER JOIN `category` ON `category`.`Category_ID` = `type_device`.`TD_Category`
    WHERE `TD_Enable` <> 0 AND `category`.`Category_URL`='{$Category_URL}'";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}

function GetAllTypeDeviceANDManufacturer()
{
    $sql = "SELECT `type_device`.`TD_ID`, CONCAT(`Category_Name_RU`,' / ',`TD_Name_RU`) AS `TypeDevice`
    FROM `category`
    INNER JOIN `type_device` ON `type_device`.`TD_Category` = `category`.`Category_ID`";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    $smartyRS = array();

    while ($row = mysqli_fetch_assoc($rs)) {
        $rsTypeDevice = getManufacturerForCat($row['TD_ID']);
        if ($rsTypeDevice) {
            $row['Manufacturer'] = $rsTypeDevice;
        }
        $smartyRS[] = $row;
    }

    return $smartyRS;
}

function GetTypeDeviceByURL($Category_ID)
{
    $sql = "SELECT * FROM `type_device` WHERE `TD_URL` = '{$Category_ID}' ORDER BY `TD_Name_RU`";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}

function GetTypeDeviceByManufacturer($ManufacturerID)
{
    $sql = "SELECT `TD_ID` 
    FROM `type_device` 
    INNER JOIN `manufacturer` ON `manufacturer`.`M_TD`=`type_device`.`TD_ID`
    WHERE `manufacturer`.`M_ID` = '{$ManufacturerID}'";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs)[0];
}

function SetTypeDevice($TypeDeviceNameUA, $TypeDeviceNameRU, $TypeDeviceCategory, $TypeDeviceImage, $TypeDeviceURL, $TypeDeviceEnable)
{
    $sql = "INSERT INTO `type_device`(`TD_Name_UA`, `TD_Name_RU`, `TD_Category`, `TD_Image`, `TD_URL`, `TD_Enable`) 
    VALUES ('{$TypeDeviceNameUA}','{$TypeDeviceNameRU}','{$TypeDeviceCategory}','{$TypeDeviceImage}','{$TypeDeviceURL}',{$TypeDeviceEnable})";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}

function UpdateTypeDeviceById($TD_ID, $TD_Name_UA, $TD_Name_RU, $TD_Category, $TD_Image, $TD_URL, $TD_Enable)
{
    $sql = "UPDATE `type_device` SET 
    `TD_Name_UA`='{$TD_Name_UA}',
    `TD_Name_RU`='{$TD_Name_RU}',
    `TD_Category`='{$TD_Category}',
    `TD_Image`='{$TD_Image}',
    `TD_URL`='{$TD_URL}',
    `TD_Enable`='{$TD_Enable}' 
    WHERE `TD_ID` = '{$TD_ID}'";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}

