<?php

/**
 * Class Songs
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Galerie extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/Galerie
     */
    public function index()
    {
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        //$songs_model = $this->loadModel('SongsModel');
        //$songs = $songs_model->getAllSongs();

        // load another model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        //$stats_model = $this->loadModel('StatsModel');
        //$amount_of_songs = $stats_model->getAmountOfSongs();
		
        $title = 'Galerie';
		$active = 'gallery';

        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/galerie/index.php';
        require 'application/views/_templates/footer.php';
    }
    
    public function untergalerie($galleryName)
    {
        if(isset($galleryName))
            $title = $galleryName;
        else
            $title = 'Galerie';
    
        $active = 'gallery';
    
        require 'application/views/_templates/header.php';
        require 'application/views/galerie/untergalerie.php';
        require 'application/views/_templates/footer.php';
    }
}
