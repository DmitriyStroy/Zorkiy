<?
function GetAllStore()
{
    $sql = "SELECT * FROM `store_addresses`";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}