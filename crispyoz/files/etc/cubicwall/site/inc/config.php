<?php
session_start();
define('HOME_PAGE', 'main.php');
define('SITE_URL','http://' . $_SERVER['HTTP_HOST'] . '/');
define('HOME_URL', SITE_URL . HOME_PAGE);
define('SYSTEM_NAME', 'CubicWall Administration');
define('DB_NAME', '/etc/cubicwall/data/cubicwall.db');
define('UBUS_SESSION_LIMIT',600);
$api_method = 'POST';
?>
