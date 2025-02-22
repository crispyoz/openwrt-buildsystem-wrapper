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
            $qry = 'select black.frag as Pattern, count() as Hits from black_stats inner join black on black.id = black_stats.frag_id group by black.frag';
            $qry2 = 'select local_black.frag as Pattern, count() as Hits from local_black_stats inner join local_black on local_black.id = local_black_stats.frag_id group by local_black.frag';
            $result = $db->query( $qry . ' union ' . $qry2 .' order by count() desc');

        ?>

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
                            <h1 class="h3 mb-2 text-gray-800" align="center">Statistical Analysis</h1>

                            <!-- DataTable -->

                            <div class="card shadow mb-4">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <th>Blocked Pattern</th>
                                                    <th style="">Hits</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($result)){
                                                foreach ($result as $row) { ?>
                                                        <tr valign="center">
                                                        <td>
                                                            <?php echo $row['Pattern']; ?>
                                                        </td>
                                                        <td align="center" valign="center"  width="25%" height="50px" > <?php echo($row['Hits']); ?> </td>
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




