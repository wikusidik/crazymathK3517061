<?php
	$userInfo = $_COOKIE['loginInfo'];
	setcookie("loginInfo",$userInfo,time()+86400*7,"/crazymath_k3517061");
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