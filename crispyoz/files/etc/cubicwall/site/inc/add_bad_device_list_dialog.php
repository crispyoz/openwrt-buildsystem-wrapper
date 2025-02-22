<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="#" method="post">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Device</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="modalDataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>ID</th>
                                    <th>Device</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($clients)){
                                foreach ($clients as $row) { 
                                         ?>
                                        <tr valign="center">
                                            <td align="left" width="10%" height="20px"> <?php echo($row); ?> </td>
                                            <td align='left'  style="width: 60%; border:1px solid #fff"><?php echo($api->getHostFromIP($row)) ?></td>
                                             <td align='center'  style="width: 30%; border:1px solid #fff">
                                            <form action="baddevicelist.php" method="post">
                                                <button class="btn btn-sm btn-primary btn-block" type="submit"  name="addAction"  style="height:30px; width:120px">Add</button>
                                                <input type="hidden" name="actionValue" value="<?php echo($row); ?>" />
                                                <input type="hidden" name="searchOptions" value="4" />
                                            </form>
                                            </td>
                                            
                                        </tr>

                                <?php } 
                                } ?>
                            </tbody>
                        </table>
                    </div>          
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
