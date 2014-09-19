<!DOCTYPE html>
<html lang="de"  xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title><?php if(isset($title)) echo $title.' - '; ?>Multimediale Jugendarbeit Sachsen e.V.</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
	<style type="text/css">
        #bigPictures {
            margin-top: 40px;
        }

            #bigPictures > a {
                text-decoration: none;
                border: none;
                color: #999;
            }

        .bigPicture {
            float: left;
            width: 220px;
            margin-right: 26.66px;
            background-color: #fff;
            box-shadow: 0px 0px 2px #ddd;
            -moz-box-shadow: 0px 0px 2px #ddd;
            -webkit-box-shadow: 0px 0px 2px #ddd;
        }

            .bigPicture:hover {
                background-color: #f7f7f7;
            }

        .bigPicturePadding {
            padding: 10px 19px 34px;
        }

        .bigPicture img {
            display: block;
        }

        .bigPicture.last {
            margin-right: 0px;
        }

        .bigPictureTitle {
            display: block;
            font-family: 'Nunito', Arial, Helvetica, sans-serif;
            font-size: 23px;
            line-height: 2em;
            letter-spacing: -1px;
            text-indent: 8px;
            padding-bottom: 2px;
            margin-bottom: 10px;
            border-bottom: 1px solid #e4e4e4;
        }

        #news {
            clear: both;
        }

        .newsHeadline {
            /* font-family: 'Nunito', Arial, Helvetica, sans-serif; */
            font-size: 24px;
            line-height: 2em;
            padding: 10px 0px;
        }

        .color-1 {
            color: #dc5130;
        }

        .color-2 {
            color: #f3ad29;
        }

        .color-3 {
            color: #49a69e;
        }

        .color-4 {
            color: #3c74a9;
        }

        .color-5 {
            color: #4c4c4c;
        }
    </style>
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
                <a class="active" href="<?php echo URL; ?>">Start</a>
                <a href="<?php echo URL; ?>Mitglieder">Mitglieder</a>
                <a href="<?php echo URL; ?>Galerie">Galerie</a>
                <a href="https://facebook.com/multimediajugend" target="_blank">Facebook</a>
            </span>
        </div>
        <div id="motd">
            Multimediale Jugendarbeit Sachsen e.V.
	</div>