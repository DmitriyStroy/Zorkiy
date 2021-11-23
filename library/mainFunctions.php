<?

function createSmartyRsArray($RS)
{
  if (!$RS) return false;

  $smartyRS = array();
  while ($row = mysqli_fetch_assoc($RS)) {
    $smartyRS[] = $row;
  }
  return $smartyRS;
}

function check_correctness_string($string)
{
  return htmlspecialchars(mysqli_real_escape_string($GLOBALS['ConnetDB'], trim($string)));
}

function d($value = null, $die = 1)
{
  echo 'Debug <br><pre>';
  print_r($value);
  echo '</pre';

  if ($die) die;
}

function redirect($url)
{
  if (!$url) $url = '/';
  header("Location: {$url}");
  exit;
}

function random_password($num = 6)
{
  return substr(str_shuffle('AEIOUYBCDFGHJKLMNPQRSTVWXYZaeiouybcdfghjklmnpqrstvwxyz-0987654321'), 0, $num);
}

function CreatePassword($email, $password)
{
  return md5($email . md5($password));
}


function loadPage($smarty, $controllerName, $actionName = 'index')
{
  include_once(PathPrefix . $controllerName . PathPostfix);
  $function = $actionName . 'Action';
  $function($smarty);
}
function loadTemplate($smarty, $templateName)
{
  $smarty->display($templateName . TempatePostfix);
}

function send_mail($email, $title, $text)
{

  mail($email, $title, "<!DOCTYPE html>
  <html>
    <head>
      <meta charset='UTF-8'>
      <title> {$title} </title>
    </head>
    
    <body style='margin:0'>
      <div style='margin:0; padding:0; font-size: 18px; font-family: Arial, sans-serif; font-weight: bold; text-align: center; background: #FCFCFD'>
        <div style='margin:0; background: #464E78; padding: 25px; color:#fff'> {$title} </div>
      <div style='padding:30px; text-align: left'>
        <div style='background: #fff; border-radius: 10px; padding: 25px; border: 1px solid #EEEFF2'>{$text}</div>
      </div>
    </div>
  </body>
  </html>", "From: admin@zorkiy.com.ua\r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=UTF-8");
}
