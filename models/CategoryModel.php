<?
include_once '../models/TypeDeviceModel.php';

function GetAllCategory()
{
    $sql = "SELECT * FROM `category`";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}

function GetCategoryByURL($url)
{
    $sql = "SELECT * FROM `category` WHERE `Category_URL` = '{$url}'";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}


function GetAllCategoryAndTypeDevice()
{
    $sql = "SELECT `Category_ID`,`Category_Name_UA`, `Category_Name_RU`,`Category_URL` 
    FROM `category`";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    $smartyRS = array();

    while ($row = mysqli_fetch_assoc($rs)) {
        $rsTypeDevice = GetTypeDeviceByCategory($row['Category_ID']);
        if ($rsTypeDevice) {
            $row['TypeDevice'] = $rsTypeDevice;
        }
        $smartyRS[] = $row;
    }

    return $smartyRS;
}

function GetAllCategoryAndThemTypeDeviceRU()
{
    $sql = "SELECT `Category_ID`,`Category_Name_UA`, `Category_Name_RU`,`Category_URL` 
    FROM `category`
    WHERE `Category_Enable` <>0";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    $smartyRS = array();

    while ($row = mysqli_fetch_assoc($rs)) {
        $rsTypeDevice = GetTypeDeviceByKeyCategoryRU($row['Category_ID']);
        if ($rsTypeDevice) {
            $row['TypeDevice'] = $rsTypeDevice;
        }
        $smartyRS[] = $row;
    }

    return $smartyRS;
}

function SetNewCategory($Category_Name_UA, $Category_Name_RU, $Category_URL)
{
    $sql = "INSERT INTO `category`(`Category_Name_UA`, `Category_Name_RU`, `Category_URL`, `Category_Enable`) 
    VALUES ('{$Category_Name_UA}', '{$Category_Name_RU}', '{$Category_URL}', 0)";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}

function UpdateCategoryById($Category_ID, $Category_Name_UA, $Category_Name_RU, $Category_URL, $Category_Enable)
{
    $sql = "UPDATE `category` SET 
    `Category_Name_UA`='{$Category_Name_UA}', 
    `Category_Name_RU`='{$Category_Name_RU}', 
    `Category_URL`='{$Category_URL}', 
    `Category_Enable`='{$Category_Enable}' 
    WHERE `Category_ID` = '{$Category_ID}'";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}
