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

//        // load news
//        foreach ($lastNews as $news) {
//            if(!isset($news->id))
//                continue;
//            $id = $news->id;
//            $image = isset($news->image) ? $news->image : '';
//            $headline = isset($news->header) ? $news->header : '';
//            $text = isset($news->text) ? $news->text : '';
//            $newsid = isset($news->newsid) ? $news->newsid : 0;
//            $published = isset($news->published) ? $news->published : null;
//            $curVersion = isset($news->version) ? $news->version : 1;
//
//            $newsVersions = $newsTeaser_model->getNewsVersions($id);
//            $showVersion = isset($news->version) ? $news->version : 1;
//            include 'application/views/start/index/newsTemplate.php';
//        }

        $id = 2;
        $image = 'public/img/vbmittweida.png';
        $headline = 'Sch&ouml;ne Feiertage + Vereinsvoting';
        $text = '<p>Das Team der HSF-Clanwars und des Multimediale Jugendarbeit Sachsen e.V. w&uuml;nscht euch ein frohes Weihnachtsfest, tolle Feiertage und Geschenke und einen guten Rutsch ins neue Jahr!<br />Wir m&ouml;chten uns auf diesem Wege nochmal für eure treue Unterst&uuml;tzung bedanken, sowie für die wunderbare LAN-Party, die erst durch euch zu einer so guten Veranstaltung wurde.</p>'
                . '<p>Wenn auch ihr uns noch einmal Danke sagen wollt, dann helft uns beim derzeitigen Vereinsvoting der Volksbank Mittweida. Den Gewinnern und allen Teilnehmern mit über 50 Votes winken angenehme Zusch&uuml;sse zur Vereinskasse, womit wir unsere technische Ausr&uuml;stung weiter aufstocken w&uuml;rden, was auch der allj&auml;hrlichen Clanwars sehr Zugute kommen w&uuml;rde!<br />Alles was es dazu braucht, ist ein Klick auf diesen <a href="http://www.hsf-clanwars.de/phplist/lt.php?id=cUoGGQ5MAFU">Link</a>. Dort k&ouml;nnt ihr für uns nach einer kurzen Registrierung abstimmen. Wir danken euch vielmals!</p>'
                . '<p>Viele Gr&uuml;&szlig;e,<br /><i>Euer mjs e.V.- und HSF-Clanwars-Team!</i></p>';
        $newsid = 0;
        $published = date('D, d M Y H:i', 1418919300);
        $curVersion = 1;
        $newsVersions = null;
        $showVersion = 1;
        include 'application/views/start/index/newsTemplate.php';

        $id = 1;
        $image = 'public/img/construction.png';
        $headline = 'Neue Webseite';
        $text = '<p>Nach viel getaner Arbeit freuen wir uns, euch unsere neue Internetpräsenz vorstellen zu d&uuml;rfen. Schaut euch ein wenig um und erfahrt mehr über den Multimediale Jugendarbeit Sachsen e.V.</p>'
                . '<p>Derzeit befindet sich die Webseite noch im Aufbau und einige Unterseiten sind noch nicht verfügbar. Wir bitten das zu entschuldigen und würden uns freuen, wenn ihr demnächst noch einmal bei uns vorbei schaut.</p>'
                . '<p>Viele Gr&uuml;&szlig;e,<br /><i>Euer mjs e.V.-Team</i></p>';
        $newsid = 0;
        $published = date('D, d M Y H:i', 1418911200);
        $curVersion = 1;
        $newsVersions = null;
        $showVersion = 1;
        include 'application/views/start/index/newsTemplate.php';

        
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
