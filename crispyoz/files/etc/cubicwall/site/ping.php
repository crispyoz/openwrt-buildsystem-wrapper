<?php
    $result = array('code' => '200', 'message' => 'OK');
    //set content type header for response
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    //send it back to the client
    echo json_encode($result, true);
  exit;

?>
