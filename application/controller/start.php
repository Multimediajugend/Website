<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Start extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views. within the views we can echo out $songs and $amount_of_songs easily
		$title = 'Start';
        require 'application/views/_templates/header.php';
        require 'application/views/start/index.php';
        require 'application/views/_templates/footer.php';
    }
	
	public function kooperation()
	{
        // load views. within the views we can echo out $songs and $amount_of_songs easily
		$title = 'Kooperation';
        require 'application/views/_templates/header.php';
        require 'application/views/start/kooperation.php';
        require 'application/views/_templates/footer.php';
	}
		
	public function lanparty()
	{
        // load views. within the views we can echo out $songs and $amount_of_songs easily
		$title = 'Lanparty';
        require 'application/views/_templates/header.php';
        require 'application/views/start/lanparty.php';
        require 'application/views/_templates/footer.php';
	}
		
	public function musik()
	{
        // load views. within the views we can echo out $songs and $amount_of_songs easily
		$title = 'Musik';
        require 'application/views/_templates/header.php';
        require 'application/views/start/musik.php';
        require 'application/views/_templates/footer.php';
	}
		
	public function sport()
	{
        // load views. within the views we can echo out $songs and $amount_of_songs easily
		$title = 'Sport';
        require 'application/views/_templates/header.php';
        require 'application/views/start/sport.php';
        require 'application/views/_templates/footer.php';
	}
}
