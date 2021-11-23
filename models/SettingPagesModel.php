<?

function GetMetaDataPageRU()
{
    $sql = "SELECT `M_Header_ru`, `M_Title_ru`, `M_Description_ru`, `M_URL_ru`, `M_Image_ru` 
    FROM `setting_pages` 
    WHERE `M_URL_ru` = '{$_SERVER['REQUEST_URI']}'";

    $smartyRS = createSmartyRsArray(mysqli_query($GLOBALS['ConnetDB'], $sql));
    return $smartyRS;
}
