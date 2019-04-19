<?php
	include_once "conn.php";
	$sql = mysqli_query($conn,"SELECT * FROM scores ORDER BY score desc limit 1");
	$userInfo = [];
	while($row = mysqli_fetch_array($sql)){
		for($i=0;$i<(count($row)/2);$i++){
			array_push($userInfo,$row[$i]);
		}
	}
	if(count($userInfo)>0){
		//do nothing
	}else{
		$userInfo = "";
	}
	if(empty($_COOKIE['loginInfo'])){
		echo "<meta http-equiv='refresh' content='0;url=index2.php'>";
	}else{
	$val = isset($_COOKIE['loginInfo'])? json_decode($_COOKIE['loginInfo']) : ""; //get user info from cookie
	$lastplay = isset($_COOKIE['exitTime']) ? json_decode($_COOKIE['exitTime']) : ""; //get last played from cookie
	$tanggal = str_replace("/","",$val[2]);
	$tanggal = str_replace(":","",$tanggal);
	$tanggal = str_replace(" ","",$tanggal);
?>
<html>
	<head>
		<title>game crazymath</title>
	</head>
	<body>
		<h1>CRAZY MATH</h1>
		<p>Crazy Math Game</p>
		<p><?php if($val !=""){?><img src="photos/<?php echo $val[0] . '-' . $tanggal . '.jpg';?>"/></p>
		<p><?php echo "Welcome Back $val[0]!!";}?></p>
		<p>Let's do this again!!!</p>
		<p><?php if($userInfo!=""){echo "highest score by <b>\"$userInfo[1]\"</b> with score <b>\"$userInfo[2]\"</b> on <b>\"$lastplay[0]\"</b>";}?></p>
		<?php if($lastplay[1]>0){?>
			<p><a href="lanjut.php">Lanjut Main</a></p><?php }else{
				?>
			<p><a href="reEnterGame.php">Ulang Game</a></p>
		<?php }?>
		<p><a href="index2.php">Bukan Saya</a></p>
	</body>
</html>
<?php }?>