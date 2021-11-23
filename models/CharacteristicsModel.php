<?

function GetAllCharacteristicsByTypeDevice($TypeDevice)
{
    $sql = "SELECT `Characteristic_ID`, `properties`.`Properties_Name_RU`, `Characteristic_Name_RU`
    FROM `characteristic`
    INNER JOIN `properties` ON `properties`.`Properties_ID`=`characteristic`.`Characteristic_Properties`
    INNER JOIN `type_device` ON `type_device`.`TD_ID`=`properties`.`Properties_TD`
    WHERE `type_device`.`TD_ID` = {$TypeDevice}";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}

function GetCharacteristicsDeviceByID($Prod_ID)
{
    $sql = "SELECT `properties`.`Properties_Name_RU`,`Characteristic_Name_RU`
    FROM `characteristic`
    INNER JOIN `properties` ON `properties`.`Properties_ID`=`characteristic`.`Characteristic_Properties`
    WHERE `Characteristic_Model`='{$Prod_ID}'";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}
