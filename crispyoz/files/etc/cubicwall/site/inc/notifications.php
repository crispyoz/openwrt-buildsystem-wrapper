<div style="position: absolute; top: 0; left: 25; min-width: 300px;z-index: 9;">
<?php if (!empty($_SESSION['message']['error'])) { ?>
	<div class="toast fade show danger">
		<div class="toast-header"><strong class="">CubicWall Error</strong><small class="text-muted"></small>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        <div class="toast-body">
            <?php
            echo $_SESSION['message']['error'];
            unset($_SESSION['message']['error']);
            if (isset($_SESSION['ubus_rpc_session']) && !empty($_SESSION['ubus_rpc_session'])) {
                unset($_SESSION['ubus_rpc_session']);
            }
            ?>
		</div>
	</div>
<?php } ?>

<?php if (!empty($_SESSION['message']['success'])) { ?>
	<div class="toast fade show success">
		<div class="toast-header">
			<strong class="mr-auto">CubicWall Notice</strong>
			<small class="text-muted"></small>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
		</div>
		<div class="toast-body">
            <?php
            echo $_SESSION['message']['success'];
            unset($_SESSION['message']['success']);
            ?>
        </div>
    </div>                                                 
<?php } ?>

<?php if (!empty($_SESSION['message']['warn'])) { ?>
	<div class="toast fade show warn">
		<div class="toast-header">
			<strong class="mr-auto">CubicWall Warning</strong>
			<small class="text-muted"></small>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
		</div>
		<div class="toast-body">
            <?php
            echo $_SESSION['message']['warn'];
            unset($_SESSION['message']['warn']);
            ?>
        </div>
    </div>
<?php } ?>
</div>


<script>
	$("button.close[data-dismiss='toast']").on("click", function() {
		$(this).closest("div.toast.show").removeClass("show").fadeOut()
	})
	
	setTimeout(function() {
		$("div.toast.show").removeClass("show").fadeOut()
	}, 4000)
</script>

