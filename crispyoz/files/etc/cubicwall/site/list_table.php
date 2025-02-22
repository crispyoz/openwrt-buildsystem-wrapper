
<?php

if($_SESSION['list_name']=='bl')
    $_SESSION['table_name']='black';
else if($_SESSION['list_name']=='wl')
    $_SESSION['table_name']='white';
else if($_SESSION['list_name']=='ad')
    $_SESSION['table_name']='device';


try{
    $db = new PDO('sqlite:' . DB_NAME);
    //$query = 'select id, frag from local_' . $_SESSION['table_name'] . ' where disabled=false';
    //echo ($query);
    $result = $db->query('select id, frag, opt from local_' . $_SESSION['table_name'] . ' where disabled=false');
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
                    <h1 class="h3 mb-2 text-gray-800"  align="center"><?php echo(ucfirst($_SESSION['table_name']));?> List </h1>

                    <!-- DataTable -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 cutomeHeader">
                            <h6 class="m-0 font-weight-bold"></h6>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary addbutton" data-toggle="modal" data-target="#exampleModal">
                                <?php
                                    if($_SESSION['list_name']=='ad') echo('Add Device Address');
                                        else echo ('Add Pattern');
                                ?>
                                
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>ID</th>
                                            <th>Pattern</th>
                                            <th>Search Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if (!empty($result))
                                                foreach ($result as $row) { 
                                                   switch ($row['opt'] ){
                                                   	case 1:	$od = 'Ends';break;
                                                   	case 2:	$od = 'Begins';break;
	                                                case 4:	$od = 'Exact';break;
	                                                default:$od = 'Any';break;
                                                   }
                                                ?>
                                                <tr valign="center">
                                                    <td align="center" valign="middle" width="10%" height="20px"> <?php echo($row['id']); ?> </td>
                                                    <td align="left" valign="middle" width="75%" height="20px"> <?php echo $row['frag'] ?></td>
                                                    <td align="center" valign="middle" width="10%" height="20px"> <?php echo($od); ?> </td>

                                                    <td align="center">
                                                        <button type="button" class="btn btn-danger removebuttoncfm" data-desc="<?php echo $row['frag']; ?>" data-value="<?php echo $row['frag']; ?>" 									data-toggle="modal" data-target="#confirmationmodal">
                                                            Remove
                                                        </button>
                                                    </td>
                                                </tr>
                                        <?php }//} ?>
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
<?php include("inc/confirm_remove_dialog.php"); ?>
<?php include("inc/add_list_dialog.php"); ?>
<?php include("inc/all_scripts.php"); ?>
<?php include("inc/notifications.php"); ?>


<script>
    $(".removebuttoncfm").on("click", function() {
        var id = $(this).attr("data-value")
        var desc = $(this).attr("data-desc")

        $("#confirmationmodal").find("div.modal-body").text("Are you sure, want to delete `"+desc+"`?")
        $("#confirmationmodal").find("#itemid").val(id)
    })
</script>

