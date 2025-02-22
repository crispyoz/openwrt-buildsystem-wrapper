<?php if (!empty($_SESSION['message']['error'])) { ?>
    <div class="alert alert-danger" role="alert">
        <p class="text">
            <?php
            echo $_SESSION['message']['error'];
            unset($_SESSION['message']['error']);
            if (isset($_SESSION['ubus_rpc_session']) && !empty($_SESSION['ubus_rpc_session'])) {
                unset($_SESSION['ubus_rpc_session']);
            }
            ?>
        </p>
    </div>
<?php } ?>

<?php if (!empty($_SESSION['message']['success'])) { ?>
    <div class="alert alert-success" role="alert">
        <p class="text">
            <?php
            echo $_SESSION['message']['success'];
            unset($_SESSION['message']['success']);
            ?>
        </p>
    </div>
<?php } ?>

<?php if (!empty($_SESSION['message']['warn'])) { ?>
    <div class="alert alert-danger" role="alert">
        <p class="text">
            <?php
            echo $_SESSION['message']['warn'];
            unset($_SESSION['message']['warn']);
            ?>
        </p>
    </div>
<?php } ?>
