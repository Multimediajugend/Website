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
	$query = mysql_query("SELECT * FROM `users` WHERE `email`='".$data->email."' AND `password`='".md5($data->password.SALT)."';");

	$num_results = mysql_num_rows($query);
	
	if($num_results > 0)
	{
		$row = mysql_fetch_assoc ($query);
		
		$authenticated = true;
		
		$user = array(
			"id" => $row['id'],
			"firstname" => $row['firstname'],
			"lastname" => $row['lastname'],
			"lastlogin" => $row['lastlogin'],
			"email" => $row['email'],
			); 
	}

}

if($authenticated)
{
$token = md5(myuniqid());

mysql_query("INSERT INTO `authentication_tokens` (`id`, `token`, `lastused`) VALUES ('".myuniqid()."', '".$token."', CURRENT_TIMESTAMP());");

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