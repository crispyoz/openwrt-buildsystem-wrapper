	<!-- MultiStep Form -->
	<div class="container-fluid" id="grad1">
	    <div class="row justify-content-center mt-0">
		<div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2" style="">
		    <div class="card px-0 pt-4 pb-0 mt-3 mb-3 wrappwizard">
		        <img src="./assets/images/logo.png" class="logoimage" width="140" height="79"/>
		        <h2><strong><?php echo(SYSTEM_NAME)?></strong></h2>
			<p>Data Collection Consent</p>
		        <div class="row">
		            <div class="col-md-12 mx-0">
		                <form id="msform" method="POST">
		                    <input type="hidden" value="<?php echo $_POST['timezone']; ?>" name="timezone" />
		                    <input type="hidden" value='<?php echo  $_POST['wifi']; ?>' name="wifi" />
		                    <input type="hidden" value='<?php echo $_POST['password']; ?>' name="password" />

		                    <!-- progressbar -->

		                    <div class="progress">
		                        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
		                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
		                            60% Complete
		                        </div>
		                    </div>
		                    <br>
		                        <div class="form-card">
		                            <h2 class="fs-title-center">May we have your consent to collect some data to assist us in improving CubicWall?</h2>      
		                            <p class="text-left">As a CubicWall user you are part of a family of users who value their privacy, so we absolutely respect your privacy, you can review our <a href="../privacy_policy.html" target="popup" onclick="window.open('../privacy_policy.html','name','width=600,height=400')">Privacy Policy</a> for more information.<br>
		                                <br>We do need your help to improve CubicWall and that starts by giving us your permission to allow CubicWall to send us some statistical data about the sites you visit, the sites you block and how effectively CubicWall is working for you.<br>
		                                <br>The data is sent to our servers with no identifying information, we can't tell who you are from your data, that is not our business that is your business. However when we consolidate your data with the thousands of other CubicWall users, 
		                                we can gain a better understanding of our users' experience and how we can improve the experience.<br>
		                                <br>
		                                If you later change your mind, that's OK, you can opt out by disabling data collection in the Configuration page of the Admin tool.
		                            </p>
		                       	    <div class="row justify-content-left">
				               	    <div class="col-4">
						    </div>
						    <div class="col-6 text-left">
				                    	<div class="form-check">
				                        	<!--  No default check box so we are compliant with GDPR consen rules -->
				                       		<input class="form-check-input" type="radio" id="dataconsent1" name="dataconsent" value="1">
				                      	  	<label class="form-check-label" for="dataconsent1">I Consent</label>
					                </div>
					            </div>
				               	    <div class="col">
						    </div>
		                        </div>
				               	    <div class="col-4">
						    </div>
						    <div class="col-6 text-left">
				                    	<div class="form-check">
				                        	<!--  No default check box so we are compliant with GDPR consen rules -->
					                        <input class="form-check-input" type="radio" id="dataconsent0" name="dataconsent" value="0">
					                        <label class="form-check-label" for="dataconsent1">I Do NOT Consent</label>
					                </div>
					            </div>
<!--				               	    <div class="col">
						    </div> -->
		                        </div>
		                        <!-- <a href="inc/reset.php" class="next action-button resetbuttn">Reset</a> -->
		                        <input type="submit" name="next" class="next action-button" value="Next Step" />
		                </form>
		                
		            </div>
		        </div>
		    </div>
		</div>
	    </div>
	</div>

