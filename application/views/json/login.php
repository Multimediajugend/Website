<?php

if($authenticated)
{
    $output = array(
        "type" => 'success',
        "script" => URL.'public/js/admin.js',
        "token" => $token,
        "user" => $user
    ); 
}
else
{
    $output = array(
        "type" => 'failure',
    ); 
}

?>