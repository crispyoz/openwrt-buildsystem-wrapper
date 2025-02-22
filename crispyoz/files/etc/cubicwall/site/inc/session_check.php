<?php
    
require_once 'inc/config.php';
require_once 'inc/api.php';

if (empty($_SESSION['ubus_rpc_session'])) {
    $_SESSION['message']['error'] = 'Please login to access page.';
    header("Location:" . SITE_URL);
    exit();
} else {
    
}

if($_SERVER['REQUEST_METHOD'] == "GET"){
    $no_data = [0 => 'a'];
    $post_data = ['jsonrpc' => '2.0',
        'id' => 1,
        'method' => 'call',
        'params' => [
            0 => $_SESSION['ubus_rpc_session'],
            1 => 'cubicwall',
            2 => 'ping', 
            3 => [ 
                '' => '',    // we need this dummy parameter to appease the RPCD or it will fail to parse the JSON
            ],
        ],
    ];
                              
    //echo ("POST Data: " . json_encode($post_data));
    $ping_response = $api->process_api('POST', json_encode($post_data));
    //print_r ($ping_response);
    if (isset($ping_response['error'])) {
        unset($_POST['ping']);
        header("Location:" . SITE_URL);
        $_SESSION['message']['error'] = 'Please login to access page.';
        //header("Location:" . HOME_PAGE);
        exit();
    }    
} 

?>