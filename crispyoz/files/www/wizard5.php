<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2" style="">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3 wrappwizard">
                <img src="./assets/images/logo.png" class="logoimage" width="140" height="79"/>
                <h2><strong><?php echo(SYSTEM_NAME)?></strong></h2>
		<p>License</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" method="POST">
                            <!-- progressbar -->
                            <input type="hidden" value="<?php echo $_POST['timezone']; ?>" name="timezone" />
                            <input type="hidden" value='<?php echo $_POST['wifi']; ?>' name="wifi" />
                            <input type="hidden" value='<?php echo $_POST['password']; ?>' name="password" />
                            <input type="hidden" value='<?php echo $_POST['dataconsent']; ?>' name="dataconsent" />
                            <input type="hidden" value="1" id="acceptlicense" name="acceptlicense" />
                            <input type="hidden" value="somevalue" name="finalstep" />
                            <div class="progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                    80% Complete
                                </div>
                            </div>
                            <br><fieldset>
                                <div class="form-card">
<!--                                     <h2 class="fs-title">Accept License</h2>
                                   <p>I have read and agree to the terms of the <a href="../licence_agreement.html" target="popup" onclick="window.open('../licence_agreement.html','name', 'width=600,height=400')">Licence Agreement</a></p>
                                    <br> -->
                                    <h5>I have read and agree to the terms of the <a href="../licence_agreement.html" target="popup" onclick="window.open('../licence_agreement.html','name', 'width=600,height=400')">Licence Agreement</a></h5>
                                </div>
                                <input type="submit" name="next" class="next action-button" value="Yes I Agree" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
