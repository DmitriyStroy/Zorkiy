<?

function GetDeliveryMethodOnPostalService($IdPostalService)
{
    $sql = "SELECT `DM_ID`, `DM_Name`
    FROM `delivery_method` 
    WHERE (`DM_Enabled` <> 0) AND `DM_Postal_Services` = '{$IdPostalService}'";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}

function GetPaymentMethodByDeliveryMethod()
{
    $sql = "SELECT `DM_ID`, `DM_Name`, `DM_Enabled` FROM `delivery_method` WHERE `DM_Enabled` <> 0";


    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)) {
        $rsProducts = GetPaymentMethodByIdDeliveryMethod($row['DM_ID']);
        if ($rsProducts) {
            $row['PM'] = $rsProducts;
            $smartyRs[] = $row;
        }
    }
    return $smartyRs;
}
