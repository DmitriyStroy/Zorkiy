<?

function GetPostalServices()
{
    $sql = "SELECT `PS_ID`, `PS_Name`, `PS_Enable` FROM `postal_services` WHERE `PS_Enable` <> 0";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}

function GetPostalServicesAndDeliveryMethod()
{
    $sql = "SELECT `PS_ID`, `PS_Name`
    FROM `postal_services`    
    WHERE `PS_Enable` <> 0";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);

    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)) {
        $rsProducts = GetDeliveryMethodOnPostalService($row['PS_ID']);
        if ($rsProducts) {
            $row['DM'] = $rsProducts;
            $smartyRs[] = $row;
        }
    }
    return $smartyRs;
}
