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
        $newsTeaser_model = $this->loadModel('NewsTeaserModel');
        $news = $newsTeaser_model->getSpecificNews($id, $version);

        require 'application/views/_templates/header.json.php';
        require 'application/views/json/getnews.php';
        require 'application/views/_templates/footer.json.php';
    }

    public function unpublishnews($id)
    {
        $newsTeaser_model = $this->loadModel('NewsTeaserModel');
        $newsTeaser_model->unpublishNews($id);
        
        $ver = $newsTeaser_model->getNewsVersions($id)[0]->version;

        require 'application/views/_templates/header.json.php';
        $output = array(
            "type" => 'success',
            "id" => $id,
            "version" => $ver
        );        
        require 'application/views/_templates/footer.json.php';
    }
    
    public function publishnews($id, $date)
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
        require 'application/views/_templates/footer.json.php';
    }
}
