<?php

class RightsModel {

  protected static $instance = null;

  /*
   * define a singleton to prevent from instancing multiple times and so an multiple session_start()
   * @param object $db A PDO database connections
   * @return object
   */

  public static function getInstance($db) {
    if (self::$instance === null) {
      self::$instance = new self($db);
    }
    return self::$instance;
  }

  /**
   * Every model needs a database connection, passed to the model
   * @param object $db A PDO database connection
   */
  protected function __construct($db) {
    try {
      $this->db = $db;
    } catch (PDOException $e) {
      exit('Database connection could not be established.');
    }
  }

  /**
   * clone
   *
   * Kopieren der Instanz von aussen wie auch den Konstruktor verbieten
   */
  protected function __clone() {
    
  }

  /*
   * Returns a list of all users.
   * @param integer groupName Filters the userlist by a given group name.
   * @return object
   */

  public function getUserList($groupId = 0) {
    $sql = "SELECT u.* FROM
      bekb.t_profil AS u";
    if (!empty($groupId)) {
      $sql .= " LEFT JOIN t_users_groups AS ug ON ug.uid = u.id
      LEFT JOIN t_groups AS g ON g.id = ug.gid
      WHERE g.id = ?";
    }
    $sql .= " ORDER BY u.name";
    $query = $this->db->prepare($sql);
    ($groupId == 0) ? $query->execute() : $query->execute(array($groupId));

    return $query->fetchAll(PDO::FETCH_OBJ);
  }

  /*
   * Returns a list of groups which inherits a specific right.
   * @param integer rightId Filters the group list by a given right id.
   * @return object
   */

  public function getGroupsByRightId($rightId) {
    if (empty($rightId)) {
      return false;
    }
    $sql = "SELECT g.*
            FROM t_groups as g
            join t_groups_rights as gr ON gr.gid = g.id
            join t_rights as r ON r.id = gr.rid
            WHERE r.id = ?
            ORDER BY g.name";
    $query = $this->db->prepare($sql);
    $query->execute(array($rightId));

    return $query->fetchAll(PDO::FETCH_OBJ);
  }

  /*
   * Returns the groups a user is member of.
   * @param integer userId Needs the users ID.
   * @param boolean True if only the group id's shall be returned
   * @return object
   */

  public function getUsersGroups($userId = 0, $onlyId = false) {
    if (empty($userId)) {
      return false;
    }
    if ($onlyId) {
      $sql = "select g.id ";
    } else {
      $sql = "select g.* ";
    }
    $sql .= "from
            t_users_groups as ug
            left join bekb.t_profil as u on u.id = ug.uid
            left join t_groups as g on g.id = ug.gid
            where u.id = ?";
    $sql .= " ORDER BY g.name";
    $query = $this->db->prepare($sql);
    $query->execute(array($userId));

    return $query->fetchAll(PDO::FETCH_OBJ);
  }

  /*
   * Returns a list of all existing groups.
   * @return object
   */

  public function getGroupsList() {
    $sql = "SELECT * FROM
             t_groups AS g";
    $sql .= " ORDER BY g.name";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
  }

  /*
   * Returns a list of all existing rights optionally filtered by a group ID.
   * @param integer groupId ID of the group to be filtered by.
   * @return object
   */

  public function getRightsList($groupId = 0) {
    $sql = "SELECT r.*
            FROM t_rights as r ";
    if (!empty($groupId)) {
      $sql .= "RIGHT JOIN t_groups_rights as gr ON r.id = gr.rid ";
      $sql .= "WHERE gr.gid = ?";
    }
    $sql .= " ORDER BY r.controller, r.action";
    $query = $this->db->prepare($sql);

    (!empty($groupId)) ? $query->execute(array($groupId)) : $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
  }

  /*
   * Returns a groups object.
   * @return object
   */

  public function getGroup($id) {
    if (empty($id)) {
      return false;
    }
    $sql = "SELECT * FROM
             t_groups AS g
             WHERE g.id = :gid
             ORDER BY g.name";
    $query = $this->db->prepare($sql);
    $query->execute(array(":gid" => $id));

    return $query->fetch(PDO::FETCH_OBJ);
  }

  /*
   * Returns a rights object.
   * @return object
   */

  public function getRight($id) {
    if (empty($id)) {
      return false;
    }
    $sql = "SELECT * FROM
             t_rights AS r
             WHERE r.id = :rid";
    $query = $this->db->prepare($sql);
    $query->execute(array(":rid" => $id));

    return $query->fetch(PDO::FETCH_OBJ);
  }

  /*
   * Returns an object with the permissions of an user.
   * @param integer UserID
   * @return object
   */

  public function getRightsByUser($userid) {
    if (empty($userid)) {
      return false;
    }
    $sql = "SELECT gr.rid, r.*
            FROM bekb.t_profil as u
            join t_users_groups as ug ON ug.uid = u.id
            join t_groups_rights as gr ON gr.gid = ug.gid
            join t_rights as r ON r.id = gr.rid
            WHERE u.id = :uid";
    $query = $this->db->prepare($sql);
    $query->execute(array(":uid" => $userid));

    return $query->fetchAll(PDO::FETCH_OBJ);
  }

  /*
   * Returns a user.
   * @param integer userId The database ID of the user.
   * @return object
   */

  public function getUser($userId = null) {
    if (!is_numeric($userId)) {
      return false;
    }
    $sql = "SELECT * FROM
      bekb.t_profil AS u
      WHERE u.id = ?";
    $query = $this->db->prepare($sql);
    $query->execute(array($userId));
    return $query->fetch(PDO::FETCH_OBJ);
  }

  /*
   * Adds an user to a specified group.
   * @param integer userId The database ID of the user.
   * @param integer groupId The database ID of the group.
   * @return object
   */

  public function addUserToGroup($userId = null, $groupId = null) {
    if (!is_numeric($userId) or ! is_numeric($groupId)) {
      return false;
    }
    $sql = "INSERT IGNORE INTO t_users_groups 
        (uid,gid) 
      VALUES 
        (:uid, :gid)";
    $query = $this->db->prepare($sql);
    $query->execute(array(":uid" => $userId, ":gid" => $groupId));
    
    // TODO: legacy_rights neu schreiben
    
    return true;
  }

  /*
   * Adds an permission to a specified group.
   * @param integer rightId The database ID of the permission.
   * @param integer groupId The database ID of the group.
   * @return object
   */

  public function addRightToGroup($rightId = null, $groupId = null) {
    if (!is_numeric($rightId) or ! is_numeric($groupId)) {
      return false;
    }
    $sql = "INSERT IGNORE INTO t_groups_rights 
        (rid,gid) 
      VALUES 
        (:rid, :gid)";
    $query = $this->db->prepare($sql);
    $query->execute(array(":rid" => $rightId, ":gid" => $groupId));
    
    // TODO: legacy_rights neu schreiben
    
    return true;
  }

  /*
   * Removes an user from the specified group.
   * @param integer userId The database ID of the user.
   * @param integer groupId The database ID of the group.
   * @return object
   */

  public function removeUserFromGroup($userId = null, $groupId = null) {
    if (!is_numeric($userId) or ! is_numeric($groupId)) {
      return false;
    }
    $sql = "DELETE FROM t_users_groups
         WHERE uid = :uid and gid = :gid LIMIT 1";
    $query = $this->db->prepare($sql);
    $query->execute(array(":uid" => $userId, ":gid" => $groupId));
    return true;
  }

  /*
   * Removes an permission from the specified group.
   * @param integer rightId The database ID of the user.
   * @param integer groupId The database ID of the group.
   * @return object
   */

  public function removeRightFromGroup($rightId = null, $groupId = null) {
    if (!is_numeric($rightId) or ! is_numeric($groupId)) {
      return false;
    }
    $sql = "DELETE FROM t_groups_rights
         WHERE rid = :rid and gid = :gid LIMIT 1";
    $query = $this->db->prepare($sql);
    $query->execute(array(":rid" => $rightId, ":gid" => $groupId));
    return true;
  }

  /*
   * Updates a user with the given form data.
   * @param integer userId The database ID of the user.
   * @return boolean
   */

  public function updateUser($userId = null) {
    if (!is_numeric($userId)) {
      return false;
    }
    $sql = "UPDATE bekb.t_profil as u SET 
      `profil`=:profil,
      `name`=:name,
      `vorname`=:vorname,
      `email`=:email,
      `Kuerzel`=:kuerzel,
      `Telefonnummer`=:telefonnummer,
      `Bemerkung`=:bemerkung
      WHERE u.id = :uid";
    $query = $this->db->prepare($sql);
    $kuerzel = filter_input(INPUT_POST, "kuerzel", FILTER_SANITIZE_STRING, array(FILTER_NULL_ON_FAILURE));
    if($kuerzel == "") {
      $kuerzel = null;
    }
    $query->execute(array(
        ":uid" => $userId,
        ":profil" => filter_input(INPUT_POST, "account"),
        ":name" => filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING),
        ":vorname" => filter_input(INPUT_POST, "vorname", FILTER_SANITIZE_STRING),
        ":email" => filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL, array(FILTER_NULL_ON_FAILURE)),
        ":kuerzel" => $kuerzel,
        ":telefonnummer" => filter_input(INPUT_POST, "telefonnummer"),
        ":bemerkung" => filter_input(INPUT_POST, "bemerkungen", FILTER_SANITIZE_STRING)
    ));
    return true;
  }

  /*
   * Updates a group with the given form data.
   * @param integer GroupId The database ID of the group.
   * @return boolean
   */

  public function updateGroup($groupId = null) {
    if (!is_numeric($groupId)) {
      return false;
    }
    $sql = "UPDATE t_groups as g SET 
      `name`=:name,
      `bemerkungen`=:bemerkungen
      WHERE g.id = :gid";
    $query = $this->db->prepare($sql);
    $query->execute(array(
        ":gid" => $groupId,
        ":name" => filter_input(INPUT_POST, "groupname", FILTER_SANITIZE_STRING),
        ":bemerkungen" => filter_input(INPUT_POST, "bemerkungen", FILTER_SANITIZE_STRING)
    ));
    return true;
  }

  /*
   * Updates a right with the given form data.
   * @param integer rightId The database ID of the right.
   * @return boolean
   */

  public function updateRight($rightId = null) {
    if (!is_numeric($rightId)) {
      return false;
    }
    $sql = "UPDATE t_rights as r SET 
      `controller`=:controller,
      `action`=:action,
      `legacy_bit`=:legacyBit
      WHERE r.id = :rid";
    $query = $this->db->prepare($sql);
    $query->execute(array(
        ":rid" => $rightId,
        ":controller" => filter_input(INPUT_POST, "controller", FILTER_SANITIZE_STRING),
        ":action" => filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING),
        ":legacyBit" => filter_input(INPUT_POST, "legacyBit", FILTER_SANITIZE_NUMBER_INT)
    ));
    return true;
  }
  
    /*
   * Updates all legacy rights for all users by the groups (respectively rights) they belong to.
   * @return boolean
   */

  public function updateLegacyRights() {
    $sql = "SELECT BIT_OR(r.legacy_bit) as right_bits, u.id #, r.*
            FROM bekb.t_profil as u
            join t_users_groups as ug ON ug.uid = u.id
            join t_groups_rights as gr ON gr.gid = ug.gid
            join t_rights as r ON r.id = gr.rid
            WHERE r.legacy_bit is not null
            GROUP BY u.id";
    $query = $this->db->prepare($sql);
    $query->execute();
    
    // TODO: diese query mit einem UPDATE versehen
    
    return true;
  }

  /*
   * Adds a user with the given form data.
   * @return boolean
   */

  public function addUser() {
    $sql = "INSERT INTO bekb.t_profil SET 
      `profil`=:profil,
      `name`=:name,
      `vorname`=:vorname,
      `email`=:email,
      `kuerzel`=:kuerzel,
      `telefonnummer`=:telefonnummer,
      `bemerkung`=:bemerkung";
    $query = $this->db->prepare($sql);
    $query->execute(array(
        ":profil" => filter_input(INPUT_POST, "account"),
        ":name" => filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING),
        ":vorname" => filter_input(INPUT_POST, "vorname", FILTER_SANITIZE_STRING),
        ":email" => filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL, array(FILTER_NULL_ON_FAILURE)),
        ":kuerzel" => filter_input(INPUT_POST, "kuerzel", FILTER_SANITIZE_STRING),
        ":telefonnummer" => filter_input(INPUT_POST, "telefonnummer"),
        ":bemerkung" => filter_input(INPUT_POST, "bemerkungen", FILTER_SANITIZE_STRING)
    ));
    return $this->db->lastInsertId();
  }

  /*
   * Adds a group with the given form data.
   * @return integer GroupID
   */

  public function addGroup() {
    $sql = "INSERT INTO t_groups SET 
      `name`=:name,
      `bemerkungen`=:bemerkungen";
    $query = $this->db->prepare($sql);
    $query->execute(array(
        ":name" => filter_input(INPUT_POST, "groupname", FILTER_SANITIZE_STRING),
        ":bemerkungen" => filter_input(INPUT_POST, "bemerkungen", FILTER_SANITIZE_STRING)
    ));
    return $this->db->lastInsertId();
  }

  /*
   * Adds a group with the given form data.
   * @return integer GroupID
   */

  public function addRight() {
    $sql = "INSERT INTO t_rights SET 
      `controller`=:controller,
      `action`=:action,
      `legacy_bit`=:legacyBit";
    $query = $this->db->prepare($sql);
    $query->execute(array(
        ":controller" => filter_input(INPUT_POST, "controller", FILTER_SANITIZE_STRING),
        ":action" => filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING),
        ":legacyBit" => filter_input(INPUT_POST, "legacyBit", FILTER_SANITIZE_NUMBER_INT)
    ));
    return $this->db->lastInsertId();
  }

  /*
   * Deletes a user!!!
   * @param integer userId The database ID of the user.
   * @return boolean
   */

  public function deleteUser($userId = null) {
    if (!is_numeric($userId)) {
      return false;
    }
    // TODO: delete user-groups-connections!
    $sql = "DELETE FROM bekb.t_profil 
      WHERE id = :uid 
      LIMIT 1;";
    //dont delete as long as we dont delete the foreign user keys
    //$query = $this->db->prepare($sql);
    //$query->execute(array(":uid" => $userId));
    return true;
  }

  /*
   * Deletes a group!!!
   * @param integer groupId The database ID of the group.
   * @return boolean
   */

  public function deleteGroup($groupId = null) {
    if (!is_numeric($groupId)) {
      return false;
    }
    $sql = "DELETE g, ug, gr FROM t_groups as g
            LEFT JOIN t_users_groups as ug on g.id = ug.gid
            LEFT JOIN t_groups_rights as gr on g.id = gr.gid
            WHERE g.id = :gid;";
    $query = $this->db->prepare($sql);
    $query->execute(array(":gid" => $groupId));
    return true;
  }

  /*
   * Deletes a permission!!!
   * @param integer rightId The database ID of the group.
   * @return boolean
   */

  public function deleteRight($rightId = null) {
    if (!is_numeric($rightId)) {
      return false;
    }
    $sql = "DELETE r, gr FROM t_rights as r
            LEFT JOIN t_groups_rights as gr on r.id = gr.rid
            WHERE r.id = :rid;";
    $query = $this->db->prepare($sql);
    $query->execute(array(":rid" => $rightId));
    return true;
  }

}
