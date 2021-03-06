<?php
session_set_cookie_params(10800);
session_start();
?>
<!DOCTYPE html>
<html lang="de"  xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title><?php if(isset($title)) echo $title.' - '; ?>Multimediale Jugendarbeit Sachsen e.V.</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FavIcon -->
    <link rel="shortcut icon" href="<?php echo URL; ?>public/img/favicon.ico?v=2" type="image/x-icon" />
    <!-- css -->
    <link href="<?php echo URL; ?>public/css/style.css?v=1" rel="stylesheet" />
    <link href="<?php echo URL; ?>public/css/dev.css?v=1" rel="stylesheet" />
    <link href="<?php echo URL; ?>public/css/grid.css?v=1" rel="stylesheet" />
    <!-- datetimepicker.css -->
    <link href="<?php echo URL; ?>public/css/jquery.datetimepicker.css" rel="stylesheet" />
    <!-- font awesome -->
    <link href="<?php echo URL; ?>public/css/font-awesome.min.css" rel="stylesheet">
    <!-- fonts-->
    <link href='//fonts.googleapis.com/css?family=Nunito:400' rel='stylesheet' type='text/css'>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- easyModal.js (flaviusmatis) -->
    <script src="<?php echo URL; ?>public/js/jquery.easyModal.js"></script>
    <!-- datetimepicker.js -->
    <script src="<?php echo URL; ?>public/js/jquery.datetimepicker.js"></script>
    <!-- login-script -->
    <script src="<?php echo URL; ?>public/js/login.js"></script>
    <script src="<?php echo URL; ?>public/js/dev.js"></script>
</head>
<body>
<!-- header -->
<div data-content="main" id="main">
    <div data-content="admin" id="admin" style="display:none;">
        Manager (<span data-binding="vorname"></span>) 
        <span id="adminNav">
            <button id="adminPanelButtonProfile"><i class="fa fa-user fa-fw"></i> Mein Profil</button>
            <button id="adminPanelButtonUsers" onclick="location.href='<?php echo URL ?>accmgr'"><i class="fa fa-users fa-fw"></i> Accountmanager</button>
            <button id="adminPanelButtonContents" onClick="toggleContenteditor();"><i class="fa fa-font fa-fw"></i> Inhaltseditor</button>
            <button id="adminPanelButtonLogout" onClick="endAdmin();"><i class="fa fa-power-off fa-fw"></i> Logout</button>
        </span>
    </div>
    <div id="header">
        <a href="<?php echo URL; ?>"><img src="<?php echo URL; ?>public/img/mjslogo.svg" class="logo" height="120" /></a>
        <span id="topNav">
            <a <?php if(isset($active) && $active=='start') echo 'class="active" '; ?>href="<?php echo URL; ?>"><i class="fa fa-home fa-fw"></i> Start</a>
            <a <?php if(isset($active) && $active=='verein') echo 'class="active" '; ?>href="<?php echo URL; ?>verein"><i class="fa fa-group fa-fw"></i> Verein</a>
            <a <?php if(isset($active) && $active=='gallery') echo 'class="active" '; ?>href="<?php echo URL; ?>galerie"><i class="fa fa-photo fa-fw"></i> Galerie</a>
            <a href="https://facebook.com/multimediajugend" target="_blank"><i class="fa fa-facebook fa-fw"></i> Facebook</a>
        </span>
    </div>
    <div id="motd">
        Multimediale Jugendarbeit Sachsen e.V.
    </div>
