<?php
function error($type, $message){
    $error = [
        "error"=>$type,
        "error_message"=>$message
    ];
    output($error);
}

function output($output){
    header('Content-Type: application/json');
    die(json_encode($output));
}
