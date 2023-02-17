<?php
	include "db.php";

	$s_num = $_GET['num'];
	$b_num = $_POST['cn_num'];
	$r_num = $_POST["b_num"];

	$count = $b_num;

	$sql = "delete from replay where cn_num='$b_num' and num='$r_num'";

	$res = $db->query($sql);
	echo "<script> history.go(-1);</script>";		
	

?>
