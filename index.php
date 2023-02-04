<?php
session_start();
define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('VIEW_PATH',ROOT_PATH . 'view' . DIRECTORY_SEPARATOR);
define('MODEL_PATH',ROOT_PATH . 'model' . DIRECTORY_SEPARATOR);
require_once ROOT_PATH.'src/Controler.php';
require_once ROOT_PATH.'src/template.php';
require_once ROOT_PATH.'src/DatabaseConnection.php';
require_once ROOT_PATH.'src/Entity.php';
require_once ROOT_PATH.'model/page.php';
require_once ROOT_PATH.'model/router.php';

DatabaseConnection::Connect('localhost','root','','cms_with_irfan');
$dbh=DatabaseConnection::GetInstance();
$dbc=$dbh->GetConnection();
//$section=$_GET['section'] ?? $_POST['section'] ?? 'home';
$action=$_GET['seo_name'] ?? 'home';
$router=new Router($dbc);
$router->FindBy('pretty_url',$action);
$action=$router->action !="" ? $router->action:'show';
$moduleName=$router->module.'Controler';
if(file_exists('Controler/'.$moduleName.'.php')){
    include('Controler/'.$moduleName.'.php');
    $Controler=new $moduleName();
    $Controler->setEntityId($router->entity_id);
    $Controler->runAction($action);
}
