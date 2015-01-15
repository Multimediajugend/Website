<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class pw_test extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/Galerie
     */
    public function index()
    {
        require LIBS_PATH . '/password.php';
        
        if(isset($_GET["pw"]))
            echo $_GET["pw"].':'.  password_hash_test($_GET["pw"], PASSWORD_BCRYPT);
        else {
            echo "Test";
        }
    }
}