<?php
session_start();
define('HOME_PAGE', 'main.php');
define('SITE_URL','http://' . $_SERVER['HTTP_HOST'] . '/');
define('HOME_URL', SITE_URL . HOME_PAGE);
define('SYSTEM_NAME', 'CubicWall Setup');
define('UBUS_SESSION_LIMIT',300);
define('REDIRECT_TIMEOUT',80000);

$api_method = 'POST';
?>
