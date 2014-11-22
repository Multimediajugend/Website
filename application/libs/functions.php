<?php
//////////////////////////////////////////////////
// functions.php
//
// common functions for the website
//////////////////////////////////////////////////


function myuniqid(){
    return substr(md5(uniqid(rand(0,time()),1)),0,13);
}

function getUserData($auth)
{
    if(isset($_GET["token"]))
    {
        $token = $_GET["token"];
        $userid = $auth->checkToken($token);
        if(!$userid)
            return null;
        return $auth->getUserData($userid);
    }
}

function getHashedPassword($password)
{
    require LIBS_PATH . '/password.php';
    // tested - cost 11 takes about 0.11 s per run, that's enough
    return password_hash($password, PASSWORD_BCRYPT, array("cost" => 11));
}

?>