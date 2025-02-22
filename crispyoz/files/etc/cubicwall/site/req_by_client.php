<?php
require_once 'inc/config.php';
require_once 'inc/api.php';

$api = new API();

include("inc/session_check.php");

?>

<html lang="en">

    <?php include("inc/header_main.php"); ?>

    <body id="page-top">
        <?php include("inc/notifications.php"); ?>
        <?php
        try{
            $db = new PDO('sqlite:' . DB_NAME);
            $qry = "select id, fqdn,timestamp,ip from dns_traffic where ip ='" . $_SERVER['REMOTE_ADDR'] ."'";
            //            $qry2 = 'select local_black.frag as Pattern, count() as Hits from local_black_stats inner join local_black on local_black.id = local_black_stats.frag_id group by local_black.frag';
            //            $result = $db->query( $qry . ' union ' . $qry2 .' order by count() desc');
            //print_r($qry);
            $result = $db->query( $qry . ' order by timestamp desc limit 50');

        ?>

            <div id="wrapper">

                <?php include("inc/sidebar.php"); ?>
                <!-- Content Wrapper -->

                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">

                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800" align="center">My Last 50 Requests</h1>

                            <!-- DataTable -->

                            <div class="card shadow mb-4">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <th>ID</th>
                                                    <th style="">Domain</th>
                                                    <th style="">Client</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                                <?php if (!empty($result)){
                                                foreach ($result as $row) { ?>
                                                        <tr valign="center">
                                                            <td align="center" width="10%" height="20px"> <?php echo($row['id']); ?> </td>
                                                            <td align="left" width="70%" height="20px"> <?php echo($row['fqdn']); ?> </td>
                                                            <td align="left" width="20%" height="20px"> <?php echo($row['ip']); ?> </td>
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

        <?php
            $db = NULL;
        }catch(PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }
        ?>

        <?php include("inc/logout_dialog.php"); ?>
        <?php include("inc/all_scripts.php"); ?>

    </body>
</html>
