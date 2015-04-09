<?php

class mmpTicketModel
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

    public function getTicketCount()
    {
        $sql = "SELECT SUM(quantity) as quantity FROM mmp2015";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll)( is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll(PDO::FETCH_COLUMN, 0)[0];
    }
    
     public function addTicket($mail, $firstname, $lastname, $quantity)
    {
        // clean the input from javascript code for example
        $mail = strip_tags($mail);
        $firstname = strip_tags($firstname);
        $lastname = strip_tags($lastname);
        $quantity = strip_tags($quantity);
        $date = date('m/d/Y h:i:s', time());
 
        $sql = "INSERT INTO mmp2015 (email, name, lastname, date, quantity, member) VALUES (:mail, :name, :lastname, :date, :quantity, false)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':mail' => $mail, ':name' => $firstname, ':lastname' => $lastname, ':date' => $date, ':quantity' => $quantity));
    }
}

