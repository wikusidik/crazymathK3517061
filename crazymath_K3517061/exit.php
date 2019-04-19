<?php
	session_start();
	include_once "conn.php";
	$nilai = $_SESSION['nilai'];
	$nyawa = $_SESSION['nyawa'];
	$userInfo = isset($_COOKIE['loginInfo'])? json_decode($_COOKIE['loginInfo']) : "";
	
	$val = [$userInfo[0],$nilai,$userInfo[2]]; //memasukkan nilai ke cookie
	setcookie("loginInfo",json_encode($val),time() + 86400*7,"/crazymath_k3517061");
	
	if($nyawa == 0){
		$tanggal = str_replace("/","",$userInfo[2]);
		$tanggal = str_replace(":","",$tanggal);
		$tanggal = str_replace(" ","",$tanggal);
		$filename = $userInfo[0] . "-" . $tanggal . ".jpg";
		$sql = $conn->prepare("INSERT INTO scores (username,score,playtime,photo) VALUES(?,?,?,?)");
		$sql->bind_param("sis",$val[0],$val[1],date("Y/m/d H:i:s"),$tanggal);
		$sql->execute();
		$sql->close();
	}
	$val = array(date("Y/m/d H:i:s"),$nyawa);
	setcookie("exitTime",json_encode($val),time() + 86400*7,"/crazymath_k3517061"); //memasukkan waktu terakhir main
	
	session_destroy();
	if($nyawa == 0){
		echo "your score $nilai";
	}else{
		echo "your temporary score is $nilai, score won't inserted in database until game over";
	}
?>
<ul><li><a href="index.php">back to home</a></li><li><a href="logout.php">logout</a></li></ul>