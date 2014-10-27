<?php
### json generator
###
### Method: POST
### fields: email, password
###


$data = json_decode( file_get_contents('php://input') );
$authenticated = false;

if(isset($data->email) && isset($data->password))
{
    $sql = "SELECT * FROM `users` WHERE `email`=? AND `password`=?;";
    $query = $this->db->prepare($sql);
    $query->execute(array($data->email, md5($data->password.SALT)));
    $num_results = $query->rowCount();

    if($num_results > 0)
    {
        $row = $query->fetch();

        $authenticated = true;

        $user = array(
            "id" => $row->id,
            "firstname" => $row->firstname,
            "lastname" => $row->lastname,
            "lastlogin" => $row->lastlogin,
            "email" => $row->email,
            );
    }
}

if($authenticated)
{
    $token = md5(myuniqid());

    $sql = "INSERT INTO `authentication_tokens` (`id`, `token`, `lastused`, `userid`) VALUES ('".myuniqid()."', '".$token."', CURRENT_TIMESTAMP(), ".$row->id.");";
    $query = $this->db->prepare($sql);
    $query->execute();

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