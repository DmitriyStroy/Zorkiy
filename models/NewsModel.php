<?
function GetAllNews()
{
    $sql = "SELECT * FROM `news` ORDER BY `ID_News` DESC";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}

function GetNews($Id)
{
    $sql = "SELECT `Id_News`, `N_Image`, `N_ru_Name`, `N_ru_ShortDescription`, `N_ru_Description`, `N_Date` 
    FROM `news` 
    WHERE `Id_News` = {$Id}
    ORDER BY `ID_News` DESC";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return createSmartyRsArray($rs);
}

function CreateNews(
    $N_Image,
    $N_Name,
    $N_ru_Name,
    $N_ShortDescription,
    $N_ru_ShortDescription,
    $N_Description,
    $N_ru_Description
) {
    $sql = "INSERT INTO `news`(`N_Name`, `N_ShortDescription`, `N_Image`, `N_Description`, `N_ru_Name`, `N_ru_ShortDescription`, `N_ru_Description`) 
    VALUES ('{$N_Name}', '{$N_ShortDescription}', '{$N_Image}', '{$N_Description}', '{$N_ru_Name}', '{$N_ru_ShortDescription}', '{$N_ru_Description}')";
    $rs = mysqli_query($GLOBALS['ConnetDB'], $sql);
    return $rs;
}
