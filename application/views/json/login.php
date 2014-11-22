<?php

if($authenticated)
{
    $output = array(
        "type" => 'success',
        "token" => $token,
        "user" => $user,
    ); 
}
else
{
    $output = array(
        "type" => 'failure',
    ); 
}

?>