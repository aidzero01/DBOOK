<?php
	include "db.php";

	$email = $_POST['email'];
	$pw = $_POST['pw'];

	$sql = "SELECT * FROM sign_check WHERE email='$email'";
	$result = mysqli_fetch_array(mysqli_query($db, $sql));

	if($email == ""){
		echo "<script>alert('아이디를 입력해주세요') ; history.back();</script>";
	}else if($pw == "") {
		echo "<script>alert('비밀번호를 입력해주세요') ; history.back();</script>";
	}

    if($result != NULL){
    	$_SESSION['unique_id'] = $result['unique_id'];
    	$_SESSION['email'] = $result['email'];
        $_SESSION['name'] = $result['name'];
        $_SESSION['nick'] = $result['nick'];
    	$e_pw = $result['pw'];

		$sql2 = mysqli_query($db, "SELECT email FROM users WHERE email = '{$email}'");

		if(password_verify($pw, $e_pw)){
			echo "<script>alert('로그인에 성공했습니다!');";
			$status = "활동 중";
			$sql2 = mq("UPDATE users SET status = '{$status}' WHERE unique_id = {$result['unique_id']}");
        	echo "window.location.replace('index.php');</script>";
		}else {
			echo "<script>alert('로그인에 실패했습니다!');";
        	echo "window.location.replace('login.php');</script>";
			exit;
		}
    }
    if($result == NULL){
         echo "<script>alert('Invalid username or password')</script>";
         echo "<script>location.replace('login.php');</script>";
         exit;
    }

	

	
?>