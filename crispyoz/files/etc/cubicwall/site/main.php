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
        2 => 'stats',
        3 => [
            '' => ''
        ],
    ],
];

$stats_response = $api->process_api($api_method, json_encode($post_data));

$mem_data = ['jsonrpc' => '2.0',
    'id' => 1,
    'method' => 'call',
    'params' => [
        0 => $_SESSION['ubus_rpc_session'],
        1 => 'system',
        2 => 'info',
        3 => [
            '' => ''
        ],
    ],
];

$mem_response = $api->process_api($api_method, json_encode($mem_data));

//print_r($stats_response);
if (isset($stats_response['error']) && !empty($stats_response['error'])) {
    $_SESSION['message']['error'] = $stats_response['error']['message'];
    $_SESSION['last_page'] = basename($_SERVER['PHP_SELF']);
    header("Location:" . SITE_URL);
    exit();
}

if (isset($mem_response['error']) && !empty($mem_response['error'])) {
    $_SESSION['message']['error'] = $mem_response['error']['message'];
    $_SESSION['last_page'] = basename($_SERVER['PHP_SELF']);
    header("Location:" . SITE_URL);
    exit();
}
?>

<!doctype html>
<html lang="en">
    <?php include("inc/header_main.php"); ?>
    <?php
        $exec = 'ifconfig apcli0 | grep "inet addr"';
        exec($exec, $output);
        preg_match('/\d+\.\d+\.\d+\.\d+/', $output[0], $matches);
        $server_ipv4 = $matches[0];
    ?>
    
    <body id="page-top">
        <meta http-equiv="refresh" content="15"/>
        <form class="form-signin" method="post">

            <div id="wrapper">

            <?php include("inc/sidebar.php"); ?>
            <!-- Content Wrapper -->

            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <?php include("inc/sidebar_hide.php"); ?>

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800"  align="center">Home</h1>
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-3 col-md-6 ">
                                <div class="cus-card mt-2">
                                    <div class="card   border-primary shadow py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Total Requests</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800  text-left"><?php echo( number_format($stats_response['result'][1]['stats']['count']) ) ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-exchange-alt fa-2x text-primary"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cus-card mt-2">
                                    <div class="card   border-danger shadow py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-s font-weight-bold text-danger text-uppercase mb-1">Sites Blocked</div>              
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-left"><?php echo(number_format($stats_response['result'][1]['stats']['blocked']))?>&nbsp;<!--( --><?php //echo(number_format($stats_response['result'][1]['stats']['block_rate']))?><!--%)--></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-ban fa-2x text-danger" ></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cus-card mt-2">
                                    <div class="card border-info shadow py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-s font-weight-bold text-info text-uppercase mb-1">DNS Connection Resets</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-left"><?php echo(number_format($stats_response['result'][1]['stats']['resets'])) ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-unlink fa-2x text-info text-center text-md-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="cus-card mt-2">
                                    <div class="card border-warning shadow py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-s font-weight-bold text-warning text-uppercase mb-1">Errors</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-left"><?php echo(number_format($stats_response['result'][1]['stats']['errors'])) ?></div>                                                
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-exclamation fa-2x text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="cus-card mt-2">
                                    <div class="card  border-primary shadow py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col ">
                                                    <div class="text-s font-weight-bold text-primary text-center text-uppercase mb-5 text-md-center">System Information</div>
                                                    <table class="mt-2 table table-responsive table-striped">
                                                        <tr>
                                                            <th>Device Name</th>
                                                            <td class="text-right"><?php echo($stats_response['result'][1]['stats']['name']) ?></td>
                                                        </tr>
							<tr>                                                                                        
                                                            <th>Device Address</th>
                                                            <td class="text-right"><?php echo($server_ipv4) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Main Black List</th>
                                                            <td class="text-right"><?php echo(number_format($stats_response['result'][1]['stats']['main_bl'])) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Your Black List</th>
                                                            <td class="text-right"><?php echo(number_format($stats_response['result'][1]['stats']['bl'])) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Main White List</th>
                                                            <td class="text-right"><?php echo(number_format($stats_response['result'][1]['stats']['main_wl'])) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Your White List</th>
                                                            <td class="text-right"><?php echo(number_format($stats_response['result'][1]['stats']['wl'])) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Software Version</th>
                                                            <td class="text-right"><?php echo($stats_response['result'][1]['stats']['version']) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Board Version</th>
                                                            <td class="text-right"><?php echo($stats_response['result'][1]['stats']['board_version']) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Current Cube Time</th>
                                                            <td class="text-right">
                                                            <?php 
                                                                $s=$stats_response['result'][1]['stats']['time'];
                                                                echo(substr($s, 0, strlen($s)-3));
                                                            ?>
                                                            </td>
                                                        </tr>
                                                        <!--
                                                        <tr>
                                                            <th>Free Space</th>
                                                            <td class="text-right"><?php //echo(number_format( ((($mem_response['result'][1]['memory']['free']) /1024 ) * 1000)   )) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Stats DB Free Space</th>
                                                            <td class="text-right"><?php //echo(number_format( (disk_free_space('/etc/cubicwall/data') / disk_total_space('/etc/cubicwall/data')) * 100 )) . '%' ?></td>
                                                        </tr>
                                                        -->

                                                        <!--   <tr>
                                                        <th>Unique Clients</th>
                                                        <td class="text-right"><?php //echo(number_format($stats_response['result'][1]['stats']['clients'])) ?></td>
                                                        </tr> -->
                                                    </table>

                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-info fa-2x text-primary text-center text-md-right"></i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--
                                <div class="cus-card mt-auto">
                                <div class="card  border-primary shadow py-2">
                                <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <div class="text-s font-weight-bold text-warning text-uppercase mb-1 align-content-center">System Information</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">This is some text</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">This is some text</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">This is some text</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">This is some text</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">This is some text</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">This is some text</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">This is some text</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">This is some text</div>
                                </div>
                                <div class="col-auto">
                                <i class="fas fa-exchange-alt fa-2x text-info"></i>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div> -->
                            </div>
                        </div>

                    </div>
                </div>
                <?php include("inc/footer.php"); ?>
            </div>
        </form>
        <?php include("inc/logout_dialog.php"); ?>
        <?php include("inc/all_scripts.php"); ?>
        <?php include("inc/notifications.php"); ?>

    </body>

</html>
