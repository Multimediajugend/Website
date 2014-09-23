<!DOCTYPE html>
<html lang="de"  xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title><?php if(isset($title)) echo $title.' - '; ?>Multimediale Jugendarbeit Sachsen e.V.</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
    <!-- fonts-->
    <link href='http://fonts.googleapis.com/css?family=Nunito:400' rel='stylesheet' type='text/css'>
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>public/js/application.js"></script>
</head>
<body>
<!-- header -->
<div data-content="main" id="main">
	<div id="header">
            <a href="<?php echo URL; ?>"><img src="<?php echo URL; ?>public/img/mjslogo.svg" height="120" /></a>
            <span id="topNav">
                <a <?php if(!isset($active)) echo 'class="active" '; ?>href="<?php echo URL; ?>">Start</a>
                <a <?php if(isset($active) && $active=='member') echo 'class="active" '; ?>href="<?php echo URL; ?>Mitglieder">Mitglieder</a>
                <a <?php if(isset($active) && $active=='gallery') echo 'class="active" '; ?>href="<?php echo URL; ?>Galerie">Galerie</a>
                <a href="https://facebook.com/multimediajugend" target="_blank">Facebook</a>
            </span>
        </div>
        <div id="motd">
            Multimediale Jugendarbeit Sachsen e.V.
	</div>