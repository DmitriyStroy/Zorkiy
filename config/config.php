<?
/*

    File settings

*/

//>const for appeal to controllers
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');
//<


//>used template
$tempate = 'default';
$tempateAdmin = 'admin';

//way to files temptate(*.tpl)
define('TemplatePrefix', "../views/{$tempate}/");
define('TemplateAdminPrefix', "../views/{$tempateAdmin}/");

define('TempatePostfix', '.tpl');

//way to files template in web space
define('TemplateWebPath', "templates/{$tempate}/");
define('TemplateAdminWebPath', "templates/{$tempateAdmin}/");
//<

//Initilization template Smarty
//put full path to Smarty.class.php
require('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/Smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('templateWebPath', TemplateWebPath);
//<
