<?php
function debug($variable){
	echo'<pre>' . print_r($variable, true) . '<pre>';
}

function start(){
	if(session_status() == PHP_SESSION_NONE){
	session_start();
	}
}

function degage(){
	if(!isset($_SESSION['auth'])){
        header('Location: login.php');
        exit();
    }
}

function iflog(){
	if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])){
		header('Location: acount.php');
		exit();
	}
}
?>