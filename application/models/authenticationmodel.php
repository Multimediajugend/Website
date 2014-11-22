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
     * Check if token is valid
     * @param string $token
     * @return boolean corresponding userid for token or false if token is not valid
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
     * Get user data for specified userid or email
     * @param int $needle key => value
     * @return mixed user data in an array or false
     */
    public function getUserData(array $needle, $includePassword = false)
    {
        if(!in_array(key($needle), array('id', 'email'))) // enforce it must be id or email to avoid sql injections
        {
            return false;
        }

        $sql = "SELECT * FROM `users` WHERE `".key($needle)."`=?;";
        $query = $this->db->prepare($sql);
        $query->execute(array(current($needle))); 
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

            if($includePassword)
            {
                $user["password"] = $result->password;
            }

            return $user;
        }
        else
        {
            return false;
        }
    }
}
