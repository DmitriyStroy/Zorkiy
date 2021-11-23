<?

function GetAllDevicePictureByID($Prod_ID)
{
    $sql = "SELECT `DP_ID`, `DP_Image`, `DP_Device`
        FROM `device_picture`
        WHERE `DP_Device`='{$Prod_ID}' 
        ORDER BY `DP_Main`";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    return createSmartyRsArray($rs);
}

function AddDevicePictureByID($DP_Device, $newFileName)
{
    $sql = "INSERT INTO `device_picture`(`DP_ID`, `DP_Device`, `DP_Image`, `DP_Main`) 
    VALUES (null, {$DP_Device}, '{$newFileName}', 0)";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}


function UpdateDevicePictureByID($Prod_ID, $newFileName)
{
    $sql = "UPDATE `device_picture` 
    SET `DP_Device`=[value-2],`DP_Image`=[value-3],`DP_Main`=[value-4] WHERE `DP_Device`=";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    return $rs;
}


function UpdateMainPictureByID($Picture_ID, $DP_Device)
{
    $sql = "UPDATE `device_picture` SET `DP_Main`= 0 WHERE `DP_Device` = {$DP_Device}";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    if ($rs) {
        $sql = "UPDATE `device_picture` SET `DP_Main`= 1 WHERE `DP_ID`={$Picture_ID} AND `DP_Device` = {$DP_Device}";
        $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    }
    return $rs;
}
