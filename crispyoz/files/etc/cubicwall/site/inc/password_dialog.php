
    <!-- Modal -->
        <div class="modal fade" id="passChange" tabindex="-1" role="dialog" aria-labelledby="passChangeLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="frmPassChange" action="passchange.php" method="POST">

                        <div class="modal-header">
                            <h5 class="modal-title" id="passChangeLabel">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="pass" class="col-form-label">Enter New Password:</label>
                                <input type="password" required min="5" class="form-control" name="password" id="txtPass" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label for="pass" class="col-form-label">Re-Enter Password:</label>
                                <input type="password" required min="5" class="form-control" name="rePass" id="txtRePass" placeholder="Re-Enter Password">
                            </div>

                            <div class="alertc" role="alert">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="hidden" id="passwordAction" name="passwordAction">
                            <button type="submit" class="btn btn-primary" id="btnCP">Change Password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
