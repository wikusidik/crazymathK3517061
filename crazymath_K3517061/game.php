<html>
	<?php
		session_start();
		$userInfo = isset($_COOKIE['loginInfo'])? json_decode($_COOKIE['loginInfo']) : "";
		if(empty($_SESSION['jawaban'])){
			$_SESSION['nilai'] = 0;
			$_SESSION['nyawa'] = 5;
		}else{
			if(isset($_POST['jawab'])){
				if($_POST['jawab'] == $_SESSION['jawaban']){
					$_SESSION['nilai'] = $_SESSION['nilai'] + 10;
				}else{
					$_SESSION['nilai'] = $_SESSION['nilai'] - 5;
					$_SESSION['nyawa']--;
				}
				if($_SESSION['nilai'] > $userInfo[1]){
					$userInfo[1] = $_SESSION['nilai'];
					setcookie("loginInfo",json_encode($userInfo),time() + 86400*7,"/crazymath");
				}
			}else{
				$_SESSION['nilai'] = $_SESSION['nilai'] - 5;
				$_SESSION['nyawa']--;
			}
		}
		$angka1 = rand(0,100);
		$angka2 = rand(0,100);
		$_SESSION['jawaban'] = $angka1 + $angka2;
	?>
	<head>
		<title>game crazymath</title>
	</head>
	<body>
		<h1>CRAZY MATH</h1>
		<p>User  : <?php echo $userInfo[0];?></p>
		<p>Score : <?php echo $_SESSION['nilai'];?></p>
		<p>Nyawa : <?php for($i=1;$i<=$_SESSION['nyawa'];$i++){ echo "X  ";}?></p>
		<?php if($_SESSION['nyawa'] > 0){?>
		<form method="POST" action=#>
			<table>
				<tr>
					<td align="center"><?php echo $angka1;?></td>
					<td>+</td>
					<td align="center"><?php echo $angka2;?></td>
					<td><input type="text" name="jawab" autofocus/></td>
				</tr>
				<tr>
					<td colspan=4>
						<input type="submit" value="jawab"/>
					</td>
				</tr>
			</table>
		</form>
	<?php }else{ echo "<h1>Game Over</h1>";}?>
		<a href="exit.php"><button>keluar game</button></a>
	</body>
</html>