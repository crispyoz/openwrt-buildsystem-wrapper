<?php
require 'inc/config.php';
require 'inc/api.php';

$api = new API();

include("inc/session_check.php");

$api_method = 'POST';

$post_data = ['jsonrpc' => '2.0',
    'id' => 1,
    'method' => 'call',
    'params' => [
        0 => $_SESSION['ubus_rpc_session'],
        1 => 'cubicwall',
        2 => 'clients',
        3 => [
            '' => ''
        ],
    ],
];

$stats_response = $api->process_api($api_method, json_encode($post_data));

//print_r($stats_response);
if (isset($stats_response['error']) && !empty($stats_response['error'])) {
    $_SESSION['message']['error'] = $stats_response['error']['message'];
    $_SESSION['last_page'] = basename($_SERVER['PHP_SELF']);
    header("Location:" . SITE_URL);
    exit();
}

//print_r($stats_response['result'][1]);
$clients =  $stats_response['result'][1]['clients'];
?>

<html lang="en">

    <?php include("inc/header_main.php"); ?>

    <body id="page-top">
        <?php include("inc/notifications.php"); ?>

            <div id="wrapper">

                <?php include("inc/sidebar.php"); ?>
                <!-- Content Wrapper -->

                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">

                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800" align="center">Devices I Can Find On Your Network</h1>

                            <!-- DataTable -->

                            <div class="card shadow mb-4">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered order-0" id="dataTable" width="100%" cellspacing="0" >
                                            <thead style="">
                                                <tr style="text-align: center;">
                                                    <th style="" >Address</th>
                                                    <th style="">Device</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                <?php if (!empty($clients)){
                                                foreach ($clients as $row) { ?>
                                                        <tr valign="center">
                                                            <td align="left" width="20%" height="20px"> <?php echo($row); ?> </td>
                                                            <td align='left'  style="width: 70%; border:1px solid #fff"><?php echo(gethostbyaddr($row)) ?></td>
                                                        </tr>

                                                    <?php } 
                                                } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    <?php include("inc/footer.php"); ?>

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->


        <?php include("inc/logout_dialog.php"); ?>
        <?php include("inc/all_scripts.php"); ?>

    </body>
</html>
