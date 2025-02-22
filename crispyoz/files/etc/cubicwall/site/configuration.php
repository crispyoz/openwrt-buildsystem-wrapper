<?php
require_once 'inc/config.php';
require_once 'inc/api.php';

$api = new API();
include("inc/session_check.php");
$api_method = 'POST';

if (!isset($edit_mode)){
    $edit_mode=false;
} 

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['editAction'])){
    $edit_mode=true;
}
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['saveAction'])){
    $edit_mode=false;
}

if (isset($_POST['cancelSaveAction'])) {
    //print_r($_POST);
    if ($_POST['submit']=='edit') $edit_mode=true;
    if ($_POST['submit']=='cancel') $edit_mode=false;
    if ($_POST['submit']=='save') {
        $edit_mode=false;
        $post_data = ['jsonrpc' => '2.0',
            'id' => 1,
            'method' => 'call',
            'params' => [
                0 => $_SESSION['ubus_rpc_session'],
                1 => 'cubicwall',
                2 => 'set_config',
                3 => [
                    'dns1' =>  $_POST['dns1'],
                    'dns2' =>  $_POST['dns2'],
                    'dns3' =>  $_POST['dns3'],
                    'dns4' =>  $_POST['dns4'],
                    'loglevel' => $_POST['logLevel'],
                    'disabled' => (isset($_POST['disabled']) ?'1' : '0'),
                    'track' => (isset($_POST['track']) ?'1' : '0'),
                    'remote_log' => (isset($_POST['remote_log']) ?'1' : '0')                    
                ],
            ],
        ];
        //error_log(print_r($post_data));
        //print_r($post_data);
        $config_response = $api->process_api($api_method, json_encode($post_data));
     }
}


//if($_SERVER['REQUEST_METHOD'] == "GET") {

$post_data = ['jsonrpc' => '2.0',
    'id' => 1,
    'method' => 'call',
    'params' => [
        0 => $_SESSION['ubus_rpc_session'],
        1 => 'cubicwall',
        2 => 'get_config',
        3 => [
            '' => ''
        ],
    ],
];
$config_response = $api->process_api($api_method, json_encode($post_data));
//print_r($config_response['result'][1]['config']['track']);
if (isset($config_response['error']) && !empty($config_response['error'])) {
    $_SESSION['message']['error'] = $config_response['error']['message'];
    $_SESSION['last_page'] = 'main.php';
    header("Location:" . SITE_URL);
    exit();
}

$post_data = ['jsonrpc' => '2.0',
    'id' => 1,
    'method' => 'call',
    'params' => [
        0 => $_SESSION['ubus_rpc_session'],
        1 => 'uci',
        2 => 'get',
        3 => [
            'config' => 'system'
        ],
    ],
];
$system_response = $api->process_api($api_method, json_encode($post_data));

if (isset ($_SESSION['config_edit'])){
    $edit_mode=true;
}

?>

<html lang="en">
    <?php include("inc/header_main.php"); ?>

    <body id="page-top">
        <?php include("inc/notifications.php"); ?>

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
                            <h1 class="h3 mb-2 text-gray-800"  align="center">Configuration</h1>

                            <!-- DataTable -->

                            <div class="card shadow mb-4">

                                <div class="card-body">

                                    <div class="table-responsive">

                                        <table class="table" style="width: 40%;border: 2px solid #fff;  color:black" align="center" >
                                            <tbody>
                                                <tr>
                                                    <td align='left' style="width: 60%; border:1px solid #fff" data-trigger="hover" data-toggle="popover" data-content="The primary DNS is used to lookup domain names and convert them to network addresses. Ensure you configure the Primary DNS to the DNS known to perform best in your environment.">Primary DNS</td>
                                                    <td align='right'  style="width: 40%; border:1px solid #fff">
                                                        <?php if ($edit_mode==true) { ?>
                                                            <input type="text" style="text-align:right;" id="dns1" name="dns1" value="<?php echo($config_response['result'][1]['config']['dns1']) ?>" 
                                                                data-trigger="hover" data-toggle="popover" title="Primary DNS" data-content="The primary DNS is used to lookup domain names and convert them to network addresses. Ensure you configure the Primary DNS to the DNS known to perform best in your environment."/>
                                                        <?php } else {?>
                                                            <span><?php echo($config_response['result'][1]['config']['dns1']) ?></span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align='left' style="width: 60%; border:1px solid #fff" data-trigger="hover" data-toggle="popover" title="Seconday DNS" data-content="The seconday DNS is used whenever the Primary DNS is unresponsive and acts as your first backup DNS server.">Secondary DNS</td>
                                                    <td align='right'  style="width: 40%; border:1px solid #fff">
                                                        <?php if ($edit_mode==true) { ?>
                                                            <input type="text" style="text-align:right;" id="dns2" name="dns2" value="<?php echo($config_response['result'][1]['config']['dns2']) ?>" 
                                                                data-trigger="hover" data-toggle="popover" title="Seconday DNS" data-content="The seconday DNS is used whenever the Primary DNS is unresponsive and acts as your first backup DNS server."/>
                                                        <?php } else {?>
                                                            <span><?php echo($config_response['result'][1]['config']['dns2']) ?></span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align='left' style="width: 60%; border:1px solid #fff" data-trigger="hover" data-toggle="popover" data-content="The tertiary DNS is used whenever the Primary DNS and the Seconday DNS are unresponsive and acts as your second backup DNS server.">Tertiary DNS</td>
                                                    <td align='right'  style="width: 40%; border:1px solid #fff">
                                                        <?php if ($edit_mode==true) { ?>
                                                            <input type="text" style="text-align:right;" id="dns3" name="dns3" value="<?php echo($config_response['result'][1]['config']['dns3']) ?>" 
                                                                data-trigger="hover" data-toggle="popover" title="Tertiary DNS" data-content="The tertiary DNS is used whenever the Primary DNS and the Seconday DNS are unresponsive and acts as your second backup DNS server."/>
                                                        <?php } else {?>
                                                            <span><?php echo($config_response['result'][1]['config']['dns3']) ?></span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align='left' style="width: 60%; border:1px solid #fff" data-trigger="hover" data-toggle="popover" data-content="The Quaternary DNS is used whenever the Primary DNS, the Seconday DNS and the Tertiary DNS are unresponsive and acts as your third backup DNS server.">Quaternary DNS</td>
                                                    <td align='right'  style="width: 40%; border:1px solid #fff">
                                                        <?php if ($edit_mode==true) { ?>
                                                            <input type="text" style="text-align:right;" id="dns4" name="dns4" value="<?php echo($config_response['result'][1]['config']['dns4']) ?>" 
                                                                data-trigger="hover" data-toggle="popover" title="Quaternary DNS" data-content="The Quaternary DNS is used whenever the Primary DNS, the Seconday DNS and the Tertiary DNS are unresponsive and acts as your third backup DNS server."/>

                                                        <?php } else {?>
                                                            <span><?php echo($config_response['result'][1]['config']['dns4']) ?></span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align='left' style="width: 60%; border:1px solid #fff">DNS Timeout</td>
                                                    <td align='right'  style="width: 40%; border:1px solid #fff"><?php echo($config_response['result'][1]['config']['dns_timeout']) ?></td>
                                                </tr>
                                                <tr>
                                                    <td align='left' style="width: 60%; border:1px solid #fff">DNS Port</td>
                                                    <td align='right'  style="width: 40%; border:1px solid #fff"><?php echo($config_response['result'][1]['config']['dns_port']) ?></td>
                                                </tr>
                                                <tr>                                                                                                                                                              
                                                    <td align='left' style="width: 60%; border:1px solid #fff">DNS Interface</td>
                                                    <td align='right'  style="width: 40%; border:1px solid #fff"><?php echo($config_response['result'][1]['config']['interface']) ?></td>
                                                </tr>                                       
                                                <tr>
                                                    <td align='left' style="width: 60%; border:1px solid #fff">Log Level</td>
                                                    <td align='right'  style="width: 40%; border:1px solid #fff">
                                                        <?php $lvl = intval($config_response['result'][1]['config']['log_level']); ?>
                                                        <?php
                                                        if ($edit_mode==false) {
                                                            echo ($lvl==6?"Info":"Debug");   
                                                        }   
                                                        else {?>
                                                            <select name="logLevel" <?php if ($edit_mode==false) echo('disabled="true"') ?> >
                                                                <option value="6" <?php if ($lvl==6) echo('selected="true"') ?> >Info</option>
                                                                <option value="7"  <?php if ($lvl==7) echo('selected="true"') ?> >Debug</option>
                                                            </select>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align='left' style="width: 60%; border:1px solid #fff" data-trigger="hover" data-toggle="popover" title="Track Usage" data-content="This option is required in order to collect the data provided in your Statistics page.  Most users would benefit from this information, however if you prefer a greater level of privacy you can turn this option off and CubicWall will no longer record any of your data.">Track Usage</td>
                                                    <td align='right'>
                                                        <?php if ($edit_mode==true) { 
                                                            $track = ($config_response['result'][1]['config']['track']=='1')? true : false;
                                                        ?>
                                                            <input id="track" name="track" type="checkbox" <?php if ($track) echo('checked'); ?>  value="<?php ($track)? 1 : 0;?>" 
                                                                onchange="trackChangeTrigger('track')"  data-trigger="hover" data-toggle="popover" title="Track Usage" data-content="This option is required in order to collect the data provided in your Statistics page.  Most users would benefit from this information, however if you prefer a greater level of privacy you can turn this option off and CubicWall will no longer record any of your data."/>
                                                        <?php } else {?>
                                                            <input name="track" type="checkbox"  onclick="return false;"  <?php if ($config_response['result'][1]['config']['track']=='1') echo('checked');?> > 
                                                        <?php } ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align='left' style="width: 60%; border:1px solid #fff" data-trigger="hover" data-toggle="popover" title="Disabled" data-content="This option allows you to temporarily disable CubicWall's black list functionality.">Disabled</td>
                                                    <td align='right'>
                                                        <?php if ($edit_mode==true) { 
                                                            $disabled = ($config_response['result'][1]['config']['disabled']=='1')? true : false;
                                                        ?>
                                                            <input id="disabled" name="disabled" type="checkbox" <?php if ($disabled) echo('checked'); ?>  value="<?php ($disabled)? 1 : 0;?>" 
                                                                onchange="disabledChangeTrigger('disabled')"  data-trigger="hover" data-toggle="popover" title="Disabled" data-content="This option allows you to temporarily disable CubicWall's black list functionality."/>
                                                        <?php } else {?>
                                                            <input name="disabled" type="checkbox"  onclick="return false;"  <?php if ($config_response['result'][1]['config']['disabled']=='1') echo('checked');?> > 
                                                        <?php } ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align='left' style="width: 60%; border:1px solid #fff"># Threads</td>
                                                    <td align='right'  style="width: 40%; border:1px solid #fff"><?php echo($config_response['result'][1]['config']['threads']) ?></td>
                                                </tr>
                                                <tr>
                                                    <td align='left' style="width: 60%; border:1px solid #fff">Job Queue Size</td>
                                                    <td align='right'  style="width: 40%; border:1px solid #fff">
                                                        <span><?php echo($config_response['result'][1]['config']['job_queue_length']) ?></span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td align='left' style="width: 60%; border:1px solid #fff" data-trigger="hover" data-toggle="popover" title="Remote Assistance" data-content="Enabling Remote Assistance should only be enabled when requested by CubicWall Support as it sends additional activity data to our logging servers and may slow your CubicWall.">Remote Assistance</td>
                                                    <td align='right'>
                                                        <?php if ($edit_mode==true) { 
                                                            $remote_log = ($config_response['result'][1]['config']['remote_log']=='1')? true : false;
                                                        ?>
                                                            <input id="remote_log" name="remote_log" type="checkbox" <?php if ($remote_log) echo('checked'); ?>  value="<?php ($remote_log)? 1 : 0;?>" 
                                                                onchange="remoteLogChangeTrigger('remote_log')"  data-trigger="hover" data-toggle="popover" title="Remote Assistance" data-content="Enabling Remote Assistance should only be enabled when requested by CubicWall Support as it sends additional activity data to our logging servers and may slow your CubicWall."/>
                                                        <?php } else {?>
                                                            <input name="remote_log" type="checkbox"  onclick="return false;"  <?php if ($config_response['result'][1]['config']['remote_log']=='1') echo('checked');?> > 
                                                        <?php } ?>

                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
				    <div class="d-grid gap-2 col-5 mx-auto">
	                                    <div class="card  mb-4">
        	                                <input type="hidden" name="cancelSaveAction" value="submit" />
                	                        <?php if($edit_mode==false){ ?>
  		                                          <button id="save" class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="edit">Edit Configuration</button>
  	                                        <?php } else { ?>
                                            		<button id="save" class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="save">Save Configuration</button>
                                            		<button id="cancel" class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="cancel">Cancel Changes</button>
                                        	<?php }?>
                                    	   </div>
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

        </form>
        <?php include("inc/logout_dialog.php"); ?>
        <?php include("inc/all_scripts.php"); ?>
        <?php include("inc/notifications.php"); ?>
        <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();
            });
        </script>
        <script>
            function trackChangeTrigger(clickedid) { 
                if (document.getElementById(clickedid).checked == true) {
                    return false;
                } else {
                    var box= confirm("Disabling tracking will prevent CubicWall from collecting statistical data to provide you with reporting in the Statistics page. Are you sure you wish to disable this feature?");
                    if (box==true)
                        return true;
                    else
                        document.getElementById(clickedid).checked = true;
                }
            }        
        </script>
        <script>
            function remoteLogChangeTrigger(clickedid) { 
                if (document.getElementById(clickedid).checked == false) {
                    return false;
                } else {
                    var box= confirm("Enabling Remote Assistance should only be enabled when requested by CubicWall Support as it sends additional activity data to our logging servers and may slow your CubicWall. Are you sure you wish to enable this feature?");
                    if (box==true)
                        return true;
                    else
                        document.getElementById(clickedid).checked = false;
                }
            }        
        </script>
        <script>
            bootstrapValidate(['#dns1', '#dns2', '#dns3', '#dns4'], 'regex:/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/' );
        </script>
        <script>
            $(document).ready(function() {
                <?php if ($edit_mode==true) { ?>
                    $(".sidebar").addClass("sidebar-hide");
                <?php }  ?>
            });

        </script>


    </body>

</html>






