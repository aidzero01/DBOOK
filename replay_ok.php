<?php
	include "db.php";

	$b_num = $_GET['num'];
	$r_name = $_POST['r_name'];
	$r_content = $_POST['r_content'];
	$r_data = date('Y-m-d H:i:s');


	if(!isset($_SESSION['email'])){
		 echo "<script>
	    alert('로그인 해주시기 바랍니다');
	    location.href='login.php';</script>";
	}
	else if(!$r_content){
		 echo "<script>
	    alert('내용을 입력해주시기 바랍니다');
	     history.go(-1);</script>";
	}else{
		$sql_board = mq("INSERT INTO replay (cn_num,r_name,r_content,r_date) VALUES ('$b_num','$r_name','$r_content','$r_date')");	
		echo "<script>
	    history.go(-1);</script>";
	}
	

?>