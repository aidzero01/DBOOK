<?php
	include "db.php";

	$email = $_POST['email'];
	$now_email = $_GET['email'];

	$sql = "SELECT * FROM sign_check where email='$email'";
    $result = mysqli_fetch_array(mysqli_query($db, $sql));

    if($result){
    	echo "<script>alert('이메일이 존재합니다') ; history.go(-1);</script>";
    }else{
    	$sql1 = mq("update sign_check set email='$email' where email = '$now_email'");
    	$sql1 = mq("update product set p_email='$email' where p_email = '$now_email'");
    	$sql1 = mq("update board set name='$email' where name = '$now_email'");
    	$sql1 = mq("update replay set r_name='$email' where r_name = '$now_email'");
    	$sql1 = mq("update users set email='$email' where email = '$now_email'");
    	$sql1 = mq("update favorite set f_email='$email' where f_email = '$now_email'");
    	echo"<script>
    	alert('수정완료되었습니다');
    	window.close();
    	location.href='logout.php';
    	</script>";
    }


	
?>