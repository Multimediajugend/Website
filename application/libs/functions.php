<?php
//////////////////////////////////////////////////
// functions.php
//
// common functions for the website
//////////////////////////////////////////////////


function myuniqid(){
	return substr(md5(uniqid(rand(0,time()),1)),0,13);
}

?>