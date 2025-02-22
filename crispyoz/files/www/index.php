<?php
require 'inc/config.php';
require 'inc/api.php';

if (!empty($_POST)) {
    $api = new API();
    $api_method = 'POST';
    $post_data = ['jsonrpc' => '2.0',
        'id' => 1,
        'method' => 'call',
        'params' => [
            0 => '00000000000000000000000000000000',
            1 => 'session',
            2 => 'login',
            3 => [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'timeout' => UBUS_SESSION_LIMIT,
            ],
        ],
    ];

//error_log("Before post: " . print_r($post_data, TRUE));
    $api_response = $api->process_api($api_method, json_encode($post_data));
//error_log("Response: " . print_r($api_response, TRUE));  
  $response_status = [];
    if (isset($api_response['error']) && !empty($api_response['error'])) {
        $_SESSION['message']['error'] = $api_response['error']['message'];
    } else {
        if (isset($api_response['result'][1]['ubus_rpc_session']) && !empty($api_response['result'][1]['ubus_rpc_session'])) {
            $ubus_rpc_session = $api_response['result'][1]['ubus_rpc_session'];
            $_SESSION['ubus_rpc_session'] = $ubus_rpc_session;
            $_SESSION['ubus_session_time'] = microtime();
            if (isset($_SESSION['last_page'])) {
                header("Location:" . SITE_URL . $_SESSION['last_page']);
                unset($_SESSION['last_page']);
            } else {
//error_log("redirectiong to: " . SITE_URL . 'main.php');
                header("Location:" . SITE_URL . 'main.php');
            }
            exit();
        } else {
            $_SESSION['message']['error'] = 'Please enter correct login details.';
            if (!empty($_SESSION['ubus_rpc_session'])) {
                unset($_SESSION['ubus_rpc_session']);
                unset($_SESSION['ubus_session_time']);
            }// else session_start();
        }
    }
}
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

    <title><?php echo(SYSTEM_NAME) ?></title>

        <!-- Bootstrap core CSS -->
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="./assets/css/signin.css" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon.ico" />
   
    </head>

    <body class="text-center"  style="background-color: navy">
        <form class="form-signin" method="post">
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
            <img class="mb-4" src="./assets/images/logo.png" alt="" width="280" height="158">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">User Name</label>
            <input type="text" id="inputUserName" class="form-control" placeholder="User name" name="username"  style="text-transform: lowercase;" onkeyup="javascript:this.value=this.value.toLowerCase();" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </body>
</html>
