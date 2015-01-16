<?php

class AuthenticationModel {

  protected static $instance = null;
  protected $profil;
  protected $email;
  public $userName;
  protected $rechteLegacy;
  public $userId;
  protected $rightsModel; /* @var $rightsModel RightsModel */

  /*
   * define a singleton to prevent from instancing multiple times and so an multiple session_start()
   */

  public static function getInstance($db, $rightsmodel) {
    if (self::$instance === null) {
      self::$instance = new self($db, $rightsmodel);
    }
    return self::$instance;
  }

  /**
   * Every model needs a database connection, passed to the model
   * @param object $db A PDO database connection
   */
  protected function __construct($db, $rightsmodel) {
    try {
      $this->db = $db;
    } catch (PDOException $e) {
      exit('Database connection could not be established.');
    }

    // start the php session
    session_start();

    $this->rightsModel = $rightsmodel; /* @var $this->rightsModel RightsModel */
  }

  /**
   * clone
   *
   * Kopieren der Instanz von aussen wie auch den Konstruktor verbieten
   */
  protected function __clone() {
    
  }

  /**
   * Get simple "stats". This is just a simple demo to show
   * how to use more than one model in a controller (see application/controller/songs.php for more)
   */
  public function isLoggedIn() {
    if (!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * destroys all session vars, the php session and this object itself
   */
  public function logout() {
    if (!empty($_SESSION['profil'])) {
      $_SESSION['loggedIn'] = false;
      $_SESSION['profil'] = '';
    }

    if (session_id() != '' || isset($_SESSION)) {
      @session_destroy();
    }
    self::$instance = null;
  }

  public function login($profile) {
    if ($this->isLoggedIn()) {
      $profile = $_SESSION['profil'];
    }
    $sql = "SELECT * FROM bekb.t_profil WHERE profil=?";
    $query = $this->db->prepare($sql);
    $query->execute(array($profile));

    if ($query->rowCount() == 1) {
      $user = $query->fetchObject();
      $_SESSION['profil'] = $user->profil;
      $_SESSION['loggedIn'] = true;

      $this->profil = $user->profil;
      $this->email = $user->email;
      $this->userName = $user->vorname . " " . $user->name;
      $this->rechteLegacy = $user->rechte;
      $this->userId = $user->id;

      $this->rights = $this->rightsModel->getRightsByUser($this->userId);

      /*
       * set variables like the old website used them for backwardscompatibility 
       * needed when accessing old scripts via iframe
       * 
       * TODO: remove legacy section when possible
       */
      !empty($user->email) ? $_SESSION ['user_email'] = $user->email : null;
      !empty($user->vorname) && isset($user->name) ? $_SESSION ['user_name'] = $user->vorname . " " . $user->name : null;
      !empty($user->rechte) ? $_SESSION ['user_rechte'] = $user->rechte : null;
      !empty($user->id) ? $_SESSION ['user_id'] = $user->id : null;
      // end legacy segment

      return true;
    } else {
      return false;
    }
  }

  /*
   * Checks whether the current user has a specific right.
   * @param string controller This is the name of the controller to be authenticated.
   * @param string action This is the name of the controllers action to be authenticated.
   * @return boolean
   */

  public function hasRight($controller, $action) {
    if (empty($controller) || empty($action)) {
      //hum, what do you want?
      return false;
    }

    if (empty($this->rights)) {
      // the current user has no rights?
      // simply return an false:
      return false;
    }

    $hasRight = false;
    foreach ($this->rights as $right) {
      if (strtolower($right->controller) == strtolower($controller) && strtolower($right->action) == strtolower($action)) {
        $hasRight = true;
      }
    }

    if (!$hasRight) {
      return false;
    } else {
      return true;
    }
  }

  /*
   * Gets all the rights the current or a specified user has.
   * @param string userId [OPTIONAL] The id of a specified user.
   */

  public function getRights($userId = null) {
    if (empty($this->rights)) {
      // the current user has no rights?
      // so he even should not access other users rights!
      // simply return an empty array of rights:
      return array();
    }
    if (empty($userId)) {
      return $this->rights;
    }
    return $this->rightsModel->getRightsByUser($userId);
  }

}
