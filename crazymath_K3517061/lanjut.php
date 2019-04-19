<?php
	session_start();
	$temp = empty($_COOKIE['loginInfo']) ? "" : json_decode($_COOKIE['loginInfo']);
	$nilai = $temp[1];
	$temp = empty($_COOKIE['exitTime']) ? "" : json_decode($_COOKIE['exitTime']);
	$nyawa = $temp[1];
	$_SESSION['nilai'] = $nilai;
	$_SESSION['nyawa'] = $nyawa;
?>