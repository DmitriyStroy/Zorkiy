<?
function GetAllManufacturer()
{
    $sql = "SELECT * FROM `manufacturer` ORDER BY `M_ID` DESC";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}


function getAllTypeDeviceWithManufacturer()
{
    $sql = 'SELECT `ID_TD`, `TD_Name_RU` FROM `type_device`';

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    $smartyRS = array();
    while ($row = mysqli_fetch_assoc($rs)) {

        $rsManufacturer = getManufacturerForCat($row['ID_TD']);


        if ($rsManufacturer) {
            $row['Manufacturer'] = $rsManufacturer;
        }

        $smartyRS[] = $row;
    }
    return $smartyRS;
}

function getManufacturerForCat($catID)
{
    $sql = "SELECT * FROM `manufacturer` WHERE `M_TD`='{$catID}'";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    return createSmartyRsArray($rs);
}

function CreateManufacturer($ManufacturerCategory, $ManufacturerName)
{
    $sql = "INSERT INTO `manufacturer`(`M_TD`, `M_Name`) 
    VALUES ({$ManufacturerCategory}, '{$ManufacturerName}')";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}

function UpdateManufacturerById($M_ID, $M_TD, $M_Name)
{
    $sql = "UPDATE `manufacturer` SET 
    `M_TD`='{$M_TD}', 
    `M_Name`='{$M_Name}' 
    WHERE `M_ID` = '{$M_ID}'";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}

