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
?>
<html>
	<head>
		<title>game crazymath</title>
	</head>
	<body>
		<h1>CRAZY MATH</h1>
		<p>Crazy Math Game</p>
		<p><?php if($userInfo!=""){echo "highest score by <b>\"$userInfo[1]\"</b> with score <b>\"$userInfo[2]\"</b> on <b>\"$userInfo[3]\"</b>";}?></p>
		<p>Can you survive from endless math game???</p>
		<form method="POST" action="enterGame.php" enctype="multipart/form-data">
			<table>
				<tr>
					<td align="left">Enter your Name</td>
					<td>:</td>
					<td align="left"><input type="text" name="nama" required></td>
				</tr>
				<tr>
					<td align="left">Upload</td>
					<td>:</td>
					<td align="left"><input type="file" name="file" required></td>
				</tr>
				<tr>
					<td colspan="3">
						<input type="submit" value="submit"/>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>