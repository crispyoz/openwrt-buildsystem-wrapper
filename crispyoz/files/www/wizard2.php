<?php
//   print_r($_POST);
?>
<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2" style="">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3 wrappwizard">
<img src="./assets/images/logo.png" class="logoimage" width="140" height="79"/>
                <h2><strong><?php echo(SYSTEM_NAME)?></strong></h2>
                <p>Select WiFi</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" method="POST">
                            <input type="hidden" value="<?php echo $_POST['timezone']; ?>" name="timezone" />
                            <!-- progressbar -->
<div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
  aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">
    20% Complete
  </div>
</div>
<br>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Select WiFi</h2> 
                                    <div class="dropdown">
                                        <input type="hidden" name="wifi" value="" id="actucalvalue" />   
                                        <select name="wifi" id="wifiselection">
                                            <option value="">Select Wifi</option>
                                            <?php foreach ($ssid_list as $list) {
                                                if ($list['ssid'] != ' ') {
                                                    print_r($ssid_list);
                                            ?>
                                                    
                                                    <option value="<?php echo $list['ssid'] . '|' . $list['encryption']['authentication'][0]; ?>"> 
                                                    <!-- <option value="<?php // echo $list['ssid']; ?>">-->
                                                    <?php echo $list['ssid']; ?>
                                                    </option>
                                                <?php
                                                } ?>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
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
<!--
<script>
let wifis = <?php //echo $wifis; ?>;
let options = ['<option value="">Select Wifi</option>'];
wifis.result[1].results.forEach(item => {
options.push('<option value="'+item.ssid+'">'+item.ssid+'</option>');
})
setTimeout(() => {
document.getElementById('wifiselection').innerHTML = options.join('');
}, 10);

$(document).on('change', '#wifiselection', function() {
let selected = $(this).val();
wifis.result[1].results.forEach(item => {
if(item.ssid == selected) {
$("#actucalvalue").val(JSON.stringify(item))
}
})
})
</script> -->
