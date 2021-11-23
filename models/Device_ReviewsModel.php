<?

function GetAverageRatingByProduct($Prod_ID)
{
    $sql = "SELECT 
    TRUNCATE((SUM(`DR_Rating`))/(COUNT(`DR_Rating`)),1) AS `RatintDevice` 
    FROM `device_reviews` 
    WHERE `DR_Device`='{$Prod_ID}'";

    $query = mysqli_query($GLOBALS['ConnetDB'], $sql);

    $row = mysqli_fetch_assoc($query);

    return $row;
}

function GetCountRatingByProduct($Prod_ID)
{
    $sql = "SELECT COUNT(`DR_Rating`) AS `Rating`,
    (SELECT COUNT(`DR_Rating`)
    FROM `device_reviews` 
    WHERE `DR_Device`='{$Prod_ID}' AND `DR_Rating`=1)  AS `Rating1`,
    (SELECT COUNT(`DR_Rating`)
    FROM `device_reviews` 
    WHERE `DR_Device`='{$Prod_ID}' AND `DR_Rating`=2)  AS `Rating2`,
    (SELECT COUNT(`DR_Rating`)
    FROM `device_reviews` 
    WHERE `DR_Device`='{$Prod_ID}' AND `DR_Rating`=3)  AS `Rating3`,
    (SELECT COUNT(`DR_Rating`)
    FROM `device_reviews` 
    WHERE `DR_Device`='{$Prod_ID}' AND `DR_Rating`=4)  AS `Rating4`,
    (SELECT COUNT(`DR_Rating`)
    FROM `device_reviews` 
    WHERE `DR_Device`='{$Prod_ID}' AND `DR_Rating`=5)  AS `Rating5`
    
    FROM `device_reviews` 
    WHERE `DR_Device`='{$Prod_ID}'";

    $query = mysqli_query($GLOBALS['ConnetDB'], $sql);

    $row = mysqli_fetch_assoc($query);

    return $row;
}


function GetReviewsByProduct($Prod_ID)
{
    $sql = "SELECT `DR_ID`, `users`.`U_Login`, `DR_Comment`, `DR_Rating`, `DR_Date` 
    FROM `device_reviews` 
    INNER JOIN `users` ON `users`.`Id_User`=`device_reviews`.`DR_User`
    WHERE `DR_Device` = {$Prod_ID}
    ORDER BY `DR_Date` DESC";

    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    $smartyRS = array();

    while ($row = mysqli_fetch_assoc($rs)) {
        $rsAnswer = GetAnswerReviews($row['DR_ID']);
        if ($rsAnswer) {
            $row['Answer'] = $rsAnswer;
        }
        $smartyRS[] = $row;
    }

    return $smartyRS;
}


function CreateReviews($device, $user, $rating, $text_comment)
{
    $sql = "INSERT INTO `device_reviews`(`DR_Device`, `DR_User`, `DR_Comment`, `DR_Rating`) 
    VALUES ({$device}, {$user}, '{$text_comment}', {$rating})";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}
