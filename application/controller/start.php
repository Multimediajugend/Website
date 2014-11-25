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
        $active = 'start';
        
        $newsTeaser_model = $this->loadModel('NewsTeaserModel');
        $lastNews = $newsTeaser_model->getLastNews(true);

        require 'application/views/_templates/header.php';
        require 'application/views/start/index/bigPictures.php';
        require 'application/views/start/index/newsHeader.php';

        // load news
        foreach ($lastNews as $news) {
            if(!isset($news->id))
                continue;
            $id = $news->id;
            $image = isset($news->image) ? $news->image : '';
            $headline = isset($news->header) ? $news->header : '';
            $text = isset($news->text) ? $news->text : '';
            $newsid = isset($news->newsid) ? $news->newsid : 0;
            $published = isset($news->published) ? $news->published : null;
            $curVersion = isset($news->version) ? $news->version : 1;
            
            $newsVersions = $newsTeaser_model->getNewsVersions($id);
            $showVersion = isset($news->version) ? $news->version : 1;
            include 'application/views/start/index/newsTemplate.php';
        }
        require 'application/views/start/index/newsFooter.php';
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

    public function technik()
    {
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        $title = 'Technik';
        require 'application/views/_templates/header.php';
        require 'application/views/start/technik.php';
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
