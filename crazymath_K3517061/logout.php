<?php
	setcookie("loginInfo","",time()-86400*7,"/crazymath");
	setcookie("exitTime","",time()-86400*7,"/crazymath");
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
?>