<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2" style="">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3 wrappwizard">
                <img src="./assets/images/logo.png" class="logoimage" width="140" height="79"/>
                <h2><strong><?php echo(SYSTEM_NAME)?></strong></h2>
                <p>Confirm Settings</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" method="POST">
                            <!-- progressbar -->
<div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
  aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
    90% Complete
  </div>
</div>
<br>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Selection</h2>
                                    <h5 class=""><b>Timezone: </b><?php echo explode("|", $_POST['timezone'])[0]; ?></h5>
                                    <h5><b>WiFi: </b><?php echo explode("|", $_POST['wifi'])[0]; ?></h5>
                                    <h5 class=""><b>Data Sharing Consent: </b><?php if ($_POST['dataconsent']=="1") echo "Yes"; else echo "No"; ?></h5>
                                    <h5 class=""><b>License Accepted: </b><?php if ($_POST['acceptlicense']=="1") echo "Yes"; else echo "No"; ?></h5>
                                    
                                    <!-- <h5><b>Password: </b> ***********</h5> -->
                                    <input type="hidden" value="<?php echo $_POST['timezone']; ?>" name="timezone" />
                                    <input type="hidden" value='<?php echo $_POST['wifi']; ?>' name="wifi" />
                                    <input type="hidden" value='<?php echo $_POST['password']; ?>' name="password" />
                                    <input type="hidden" value='<?php echo $_POST['dataconsent']; ?>' name="dataconsent" />
                                    <input type="hidden" value='<?php echo $_POST['acceptlicense']; ?>' name="acceptlicense" />
                                    <input type="hidden" value="somevalue" name="finalstep" />
                                    <input type="hidden" value="somevalue" name="submitit" />   
                                </div>
                                <!-- <a href="inc/reset.php" class="next action-button resetbuttn">Reset</a> -->
                                <input type="submit" name="next" class="next action-button" value="Finish" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
