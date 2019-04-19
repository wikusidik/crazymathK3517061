<?php
	$user = empty($_POST['nama'])? "" : $_POST['nama'];
	$tanggal = date("Y/m/d H:i:s"); //untuk cookie
	$tanggalTemp = str_replace("/","",$tanggal); //untuk nama file
	$tanggalTemp = str_replace(":","",$tanggalTemp);
	$tanggalTemp = str_replace(" ","",$tanggalTemp);

	$filename = $user . "-" . $tanggalTemp;
	$dummy = explode(".",$_FILES['file']['name']);
	$ext = strtolower($dummy[1]);
	$filesize = $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];
	$allowedExt = array("jpg");
	if(in_array($ext,$allowedExt) === true){
		if($filesize < 1000000){
			$filename = $filename . ".jpg";
			move_uploaded_file($file_tmp,"photos/".$filename);
			$val = [$user,0,$tanggal];

			setcookie("loginInfo",json_encode($val),time()+(86400*7),"/crazymath_k3517061");
			setcookie("exitTime",$tanggal,time()+(86400*7),"/crazymath_k3517061");
			
			echo "<h3>Note that, your name will last for one week since you quit the game <br/> unless you logout</h3>";
?>
<div id="countdown"><h3>Game will start in 5</h3></div>
<script>
	var time = 5;
	window.setInterval(function(){
		if(time > 0){
			time--;
			document.getElementById("countdown").innerHTML="<h3>Game will start in "+time+"</h3>";
		}else{
			window.location.replace("game.php");
		}
	},1000);
</script>
	<?php
		}else{
			echo "file too large!!";
			echo "<meta http-equiv='refresh' content='0;url=index2.php'>";
		}
	}
	?>