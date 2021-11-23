<?

function GetPaymentMethod()
{
    $sql = "SELECT `PM_ID`, `PM_Name`, `PM_Description` FROM `payment_method` WHERE `PM_Enabled` <> 0";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}
