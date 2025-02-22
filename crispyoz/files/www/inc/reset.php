<?php
//require 'inc/config.php';
///clear session
session_destroy();
$timezoneselected = false;
$wifiselected = false;
$passwordadded = false;
$finalstep = false;
header("Location:" . HOME_PAGE);
?>