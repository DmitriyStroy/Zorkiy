<?

function GetAllFeedBack()
{
    $sql = "SELECT * FROM `feedback` ORDER BY `FB_Date` DESC";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}

function CreateFeedBack($FB_Name, $FB_Email, $FB_Phone, $FB_Description)
{
    $sql = "INSERT INTO `feedback`(`FB_ID`, `FB_Name`, `FB_Email`, `FB_Phone`, `FB_Description`, `FB_Date`, `FB_Done`) 
    VALUES (NULL, '{$FB_Name}', '{$FB_Email}', '{$FB_Phone}', '{$FB_Description}', CURRENT_TIMESTAMP, 0)";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}
