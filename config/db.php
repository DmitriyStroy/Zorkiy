<?
/*
$dblocation = "127.0.0.1:3306";
$dbname = "a8ka_zorkiynew2";
$dbuser = "root";
$dbpassword = "root";
*/

$dblocation = "a8ka.mysql.ukraine.com.ua";
$dbname = "a8ka_zorkiynew2";
$dbuser = "a8ka_zorkiynew2";
$dbpassword = "iz5a;H-4Z9";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$ConnetDB = mysqli_connect($dblocation, $dbuser, $dbpassword, $dbname);
mysqli_set_charset($ConnetDB, 'utf8');
mysqli_query($ConnetDB, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
mysqli_query($ConnetDB, "SET CHARACTER SET 'utf8'");
if (!$ConnetDB) {
    exit('Нет соиденения с базой данных.');
}

if (!mysqli_select_db($ConnetDB, $dbname)) {
    exit('Ошибка доступа к базе данных.');
}
