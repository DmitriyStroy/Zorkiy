<?
function GetAllStatus()
{
    $sql = "SELECT `OS_ID`, `OS_Name`, `OS_Color` FROM `orders_status`";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}
