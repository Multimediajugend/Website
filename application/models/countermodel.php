<?php

class CounterModel {
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
    
    public function getCounterToday()
    {
        $date = date('Y-m-d', time());
        $sql = "SELECT SUM(quantity) FROM counter WHERE date = :date";
        $query = $this->db->prepare($sql);
        $query->execute(array(':date' => $date));

        $ret = $query->fetchAll(PDO::FETCH_COLUMN, 0)[0];
        if($ret == NULL)
            $ret = 0;
        return $ret;
    }
    
    public function getCounterAll()
    {
        $sql = "SELECT SUM(quantity) FROM counter";
        $query = $this->db->prepare($sql);
        $query->execute();

        $ret = $query->fetchAll(PDO::FETCH_COLUMN, 0)[0];
        if($ret == NULL)
            $ret = 0;
        return $ret;
        
    }
    
    public function addCounter()
    {
        $date = date('Y-m-d', time());
        $sql = "SELECT SUM(quantity) FROM counter WHERE date = :date";
        $query = $this->db->prepare($sql);
        $query->execute(array(':date' => $date));

        $cnt = $query->fetchAll(PDO::FETCH_COLUMN, 0)[0];
        if($cnt == NULL)
        {
            $cnt = 0;
            $sql = "INSERT INTO counter (date, quantity) VALUES (:date, :cnt)";
        }
        else
        {
            $sql = "UPDATE counter SET quantity=:cnt WHERE date = :date";
        }
        $cnt++;
        $query = $this->db->prepare($sql);
        $query->execute(array(':date' => $date, ':cnt' => $cnt));
    }
}

