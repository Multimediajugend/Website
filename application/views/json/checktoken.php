<?php
### json generator
###
### Method: GET
### fields: token
###

//deny access if token was not valid
if(!$userid){ 
    header('HTTP/1.1 401 Unauthorized'); 
    die(); 
}

$output = array(
    "type" => 'success',
    "script" => URL.'public/js/admin.js',
    "token" => $token,
    "user" => $user,
    );

?>