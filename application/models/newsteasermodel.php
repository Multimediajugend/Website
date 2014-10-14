<?php

class NewsTeaserModel
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
     * Get all songs from database
     * @param bool $published Published
     */
    public function getLastNews($published)
    {
        $sql = "SELECT nt.newsteaserid AS id, nt.currentversion AS version, nt.userid AS userid, nt.published AS published, nt.newsid AS newsid, ver.header AS header, ver.image AS image, ver.text AS text, ver.modified AS modified
                FROM newsteaser as nt
                JOIN (SELECT newsteaserid as id, version as v, header, image, text, modified
                      FROM newsteaserversions) as ver
                ON nt.newsteaserid = ver.id AND nt.currentversion = ver.v";
        if($published) {
            $sql .= " WHERE published IS NOT NULL
                          AND published < CURRENT_TIMESTAMP()
                      ORDER BY published DESC LIMIT 2";
        } else {
            $sql .= " WHERE published IS NULL
                          OR published > CURRENT_TIMESTAMP()
                      ORDER BY nt.newsteaserid";
        }
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a newsTeaser to database
     * @param int $userid UserID
     * @param bool $published Published
     * @param int $newsId NewsID
     * @param string $header Header
     * @param string $image Image
     * @param string $text Text
     */
    public function addNewsTeaser($userid, $published, $newsid, $header, $image, $text)
    {
        // clean the input from javascript code for example
        $userid = strip_tags($userid);
        $published = strip_tags($published);
        $newsid = strip_tags($newsid);
        $header = strip_tags($header);
        $image = strip_tags($image);
        $text = strip_tags($text);

        $sql = "INSERT INTO newsteaser (userid, currentversion, published, newsid) VALUES (:userid, 1, :published, :newsid);
                INSERT INTO newsteaserversions (newsteaserid, version, userid, header, image, text) VALUES (LAST_INSERT_ID(), 1, :userid, :header, :image, :text);";
        $query = $this->db->prepare($sql);
        $query->execute(array(':userid' => $userid, ':published' => $published, ':newsid' => $newsid, ':header' => $header, ':image' => $image, ':text' => $text));
    }

    /**
     * Delete a newsTeaser in the database
     * @param int $newsTeaserId Id of newsTeaser
     */
    public function deleteSong($newsTeaserId)
    {
        $sql = "DELETE newsteaserversions WHERE newsteaserid = :newsteaserid;
                DELETE newsteaser WHERE newsteaserid = :newsteaserid;";
        $query = $this->db->prepare($sql);
        $query->execute(array(':newsteaserid' => $newsTeaserId));
    }
}
