<?php

/**
 * Class Json
 * This is for all the json handling
 *
 */
class Json extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/Galerie
     */
    public function index()
    {
        require 'application/views/_templates/header.json.php';
        require 'application/views/json/index.php';
        require 'application/views/_templates/footer.json.php';
    }

    public function login()
    {
        $auth = $this->loadModel('AuthenticationModel');
        
        require LIBS_PATH . '/password.php';

        $data = json_decode( file_get_contents('php://input') );
        $authenticated = false;

        if(isset($data->email) && isset($data->password))
        {
            $user = $auth->getUserData(array('email' => $data->email), true);

            if(password_verify($data->password, $user["password"]))
            {
                $authenticated = true;
                $token = md5(myuniqid());
                $auth->insertAuthToken($token, $user["id"]);
            }
        }
        
        require 'application/views/_templates/header.json.php';
        require 'application/views/json/login.php';
        require 'application/views/_templates/footer.json.php';
    }
    
    public function checkToken()
    {    
        $auth = $this->loadModel('AuthenticationModel');

        if(isset($_GET["token"]))
        {
            $token = $_GET["token"];
            $userid = $auth->checkToken($token);
            if($userid)
                $user = $auth->getUserData($userid);
        }

        require 'application/views/_templates/header.json.php';
        require 'application/views/json/checktoken.php';
        require 'application/views/_templates/footer.json.php';
    }

    public function getnews($id, $version)
    {
        $user = getUserData($this->loadModel('AuthenticationModel'));
        
        require 'application/views/_templates/header.json.php';
        
        if($user!=NULL)
        {
            $newsTeaser_model = $this->loadModel('NewsTeaserModel');
            $news = $newsTeaser_model->getSpecificNews($id, $version);

            require 'application/views/json/getnews.php';
        } else {
            $output = array(
                "type" => 'error'
                );
        }

        require 'application/views/_templates/footer.json.php';
    }

    public function unpublishnews($id)
    {
        $user = getUserData($this->loadModel('AuthenticationModel'));
        
        require 'application/views/_templates/header.json.php';
        
        if($user!=NULL)
        {
            $newsTeaser_model = $this->loadModel('NewsTeaserModel');
            $newsTeaser_model->unpublishNews($id);

            $ver = $newsTeaser_model->getNewsVersions($id)[0]->version;

            $output = array(
                "type" => 'success',
                "id" => $id,
                "version" => $ver
            );
        } else {
            $output = array(
                "type" => 'error'
                );
        }
        
        require 'application/views/_templates/footer.json.php';
    }
    
    public function publishnews($id, $date)
    {
        $user = getUserData($this->loadModel('AuthenticationModel'));
        
        require 'application/views/_templates/header.json.php';
        
        if($user!=NULL)
        {
        
            $newsTeaser_model = $this->loadModel('NewsTeaserModel');
            $newsTeaser_model->publishNews($id, urlencode($date));

            $ver = $newsTeaser_model->getNewsVersions($id)[0]->version;

            require 'application/views/_templates/header.json.php';
            $output = array(
                "type" => 'success',
                "id" => $id,
                "version" => $ver
            );
        } else {
            $output = array(
                "type" => 'error'
                );
        }
        
        require 'application/views/_templates/footer.json.php';
    }
}
