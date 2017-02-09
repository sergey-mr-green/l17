<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();

// Конфиг сайта
include_once '/config.php';
include_once '/libs/default.php';
include_once '/variables.php';

// Роутер
$link = mysqli_connect(DB_HOST,DB_LOGIN,DB_PASSWORD,DB_NAME);
/*if ($link) {
	echo '<p> Success <br>';
}*/

include '/modules/'.$_GET['module'].'/'.$_GET['page'].'.php';
include '/skins/'.SKIN.'/index.tpl';

echo '<pre>';
echo '-------------------------------------------------------';
/*echo '<p>GET:';
echo print_r($_GET);
echo '<p>POST:';
echo print_r($_POST);
echo '<p>COOKIE:';
echo print_r($_COOKIE);
echo '<p>SESSION:';
echo print_r($_SESSION);*/
echo '<p>GLOBALS:';
echo print_r($GLOBALS);
echo '</pre>';

