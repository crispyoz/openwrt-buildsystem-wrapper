<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2" style="">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3 wrappwizard">
<img src="./assets/images/logo.png" class="logoimage" width="140" height="79"/>
                <h2><strong><?php echo(SYSTEM_NAME)?></strong></h2>
                <p>Wifi Password</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                    <form id="msform" method="POST">
                    <input type="hidden" value="<?php echo $_POST['timezone']; ?>" name="timezone" />
                    <input type="hidden" value='<?php echo  $_POST['wifi']; ?>' name="wifi" />
                    <input type="hidden" value='<?php echo  $_POST['wifi_select']; ?>' name="wifi_select" />
                   <!-- <input type="hidden" value="somevalue" name="finalstep" /> -->

                            <!-- progressbar -->
<div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
    40% Complete
  </div>
</div>
<br>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Password</h2> 
                                    <input type="password" name="password" placeholder="WiFi Password" />
                                </div> 
                                <!-- <a href="inc/reset.php" class="next action-button resetbuttn">Reset</a> -->
                                <input type="submit" name="next" class="next action-button" value="Next Step" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>