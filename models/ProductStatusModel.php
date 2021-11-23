<?

function GetAllProductStatus()
{
    $sql = "SELECT * FROM `product_status`";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}
