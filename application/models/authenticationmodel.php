<?php

class AuthenticationModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * check if token is valid
	 * returns: corresponding userid for token or false if token is not valid
     */
    public function checkToken($token)
	{
		$sql = "SELECT `id`, `token`,UNIX_TIMESTAMP(`lastused`) as lastused, userid FROM `authentication_tokens` WHERE `token`=? AND DATE_SUB(CURDATE(),INTERVAL 1 DAY) <= `lastused`;";
		$query = $this->db->prepare($sql);
		$query->execute(array($token)); 
		$rows = $query->rowCount();
	
		if($rows == 1)
		{
			//authenticated, yeah!
			$row = $query->fetch();
			// update token to extend validity date
			$sql = "UPDATE `authentication_tokens` SET `lastused` = CURRENT_TIMESTAMP() WHERE `id`='".$row->id."';";
			$query = $this->db->prepare($sql);
			$query->execute();
		
			return $row->userid;
		}
		else
		{
			// authentication failed!
			return false;
		}
	}
	
	/**
     * check if token is valid
     */
    public function getUserData($userid)
	{
		$sql = "SELECT * FROM `users` WHERE `id`=?;";
		$query = $this->db->prepare($sql);
		$query->execute(array($userid)); 
		$results = $query->rowCount();
		
		if($results > 0)
		{
			$result = $query->fetch();
		
			$user = array(
				"id" => $result->id,
				"firstname" => $result->firstname,
				"lastname" => $result->lastname,
				"lastlogin" => $result->lastlogin,
				"email" => $result->email,
				); 
			
			return $user;
		}
		else
		{
			return false;
		}
	}
}
