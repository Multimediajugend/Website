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
	$sql = "SELECT * FROM `users` WHERE `email`='".$data->email."' AND `password`='".md5($data->password.SALT)."';";
    $query = $this->db->prepare($sql);
    $query->execute();
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

	$sql = "INSERT INTO `authentication_tokens` (`id`, `token`, `lastused`) VALUES ('".myuniqid()."', '".$token."', CURRENT_TIMESTAMP());";
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