<?

function GetAnswerReviews($IdReviews)
{
    $sql = "SELECT `DRA_ID`, `DRA_Device_Reviews`, `users`.`U_Login`, `DRA_Comment`, `DRA_Date` 
    FROM `device_reviews_answers`
    INNER JOIN `users` ON `users`.`Id_User`=`device_reviews_answers`.`DRA_User` 
    WHERE `DRA_Device_Reviews`='{$IdReviews}'";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}
