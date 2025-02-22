<?php

$api_method = 'POST';

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addAction'])){

    $post_data = ['jsonrpc' => '2.0',
        'id' => 1,
        'method' => 'call',
        'params' => [
            0 => $_SESSION['ubus_rpc_session'],
            1 => 'cubicwall',
            2 => 'add',
            3 => [
                'list' => $_SESSION['list_name'],
                'pattern' => $_POST['actionValue'],
		'option' => $_POST['searchOptions'],
            ],
        ],
    ];

    $list_add_response = $api->process_api($api_method, json_encode($post_data));
    if (isset($list_add_response['error']) && !empty($list_add_response['error'])) {
        $_SESSION['message']['error'] = $list_add_response['error']['message'];
        unset($_POST['addAction']);
        exit();
    }

    if (isset($list_add_response['result'])){

        $intResult = ((int)$list_add_response['result'][0]);
        if ($intResult == 0){
            $_SESSION['message']['success'] = $list_add_response['result'][1]['message'];
            header("Location:" . "#");
        } else if ($intResult > 0) {
            $_SESSION['message']['warn'] = $list_add_response['result'][1]['message'];
            header("Location:" . "#");
        } else {
            $_SESSION['message']['error'] = $list_add_response['result'][1]['message'];
            header("Location:" . "#");
        }
        exit();
    }
}


if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['removeAction'])){

    $post_data = ['jsonrpc' => '2.0',
        'id' => 1,
        'method' => 'call',
        'params' => [
            0 => $_SESSION['ubus_rpc_session'],
            1 => 'cubicwall',
            2 => 'remove',
            3 => [
                'list' => $_SESSION['list_name'],
                'pattern' => $_POST['actionValue'],
            ],
        ],
    ];

    $list_remove_response = $api->process_api($api_method, json_encode($post_data));
    if (isset($list_remove_response['error']) && !empty($list_remove_response['error'])) {
        $_SESSION['message']['error'] = $list_remove_response['error']['message'];
        unset($_POST['removeAction']);
        exit();
    }

    if (isset($list_remove_response['result'])){

        $intResult = ((int)$list_remove_response['result'][0]);
        if ($intResult == 0){
            $_SESSION['message']['success'] = $list_remove_response['result'][1]['message'];
            header("Location:" . "#");
        } else if ($intResult > 0) {
            $_SESSION['message']['warn'] = $list_remove_response['result'][1]['message'];
            header("Location:" . "#");
        } else {
            $_SESSION['message']['error'] = $list_remove_response['result'][1]['message'];
            header("Location:" . "#");
        }
        exit();
    }
}

?>