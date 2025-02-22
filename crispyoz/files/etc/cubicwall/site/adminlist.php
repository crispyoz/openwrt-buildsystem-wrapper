<?php

require_once 'inc/config.php';
require_once 'inc/api.php';

$_SESSION['list_name']='ad';
    
$api = new API();

include("inc/session_check.php");

include("inc/table_command_handlers.php");

?>

<html lang="en">
    <?php include("inc/header_main.php"); ?>
    
    <body id="page-top" >
        <?php include('device_list_table.php'); ?>
    </body>
</html>




