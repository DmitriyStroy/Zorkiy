<?

function GetAllOffer()
{
    $sql = "SELECT * FROM `offer` ORDER BY `O_Date` DESC";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}

function CreateOffer($O_Phone)
{
    $sql = "INSERT INTO `offer`(`O_ID`, `O_Phone`, `O_Date`, `O_Done`) VALUES (NULL,'{$O_Phone}', CURRENT_TIMESTAMP, 0)";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}
