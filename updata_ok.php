<?php
	include "db.php";

	$b_num = $_GET['num'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$data = date('Y-m-d');

	if(isset($_POST['lock_write'])){
		$lock = '1';
	}else{
		$lock = '0';	
	}

	$sql = mq("update board set title='$title' , content='$content' , data = '$data' , lock_write = '$lock' where num = '$b_num'");
	


	if($sql){
 	 echo "<script>
    alert('수정되었습니다');
    location.href='about.php';</script>";

	}
?>