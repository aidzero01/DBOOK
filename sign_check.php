<?php
	include "db.php";
	include "password.php";

	$name = $_POST['name'];
	$random_id = rand(time(), 10000000);
	$nick = $_POST['nick'];
	$email = $_POST['email'];
	$pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
	$one = $_POST['one'];
	$two = $_POST['two'];
	$three = $_POST['three'];
	$major = $_POST['p_major'];
	$grade = $_POST['p_grade'];
	$bu_major = $_POST['bu_major'];
	$status = "";
	$sql2 = "SELECT * FROM sign_check where email='$email'";
    $result2 = mysqli_fetch_array(mysqli_query($db, $sql2));

	$sql = "SELECT * FROM sign_check WHERE nick='$nick'";
	$result = mysqli_fetch_array(mysqli_query($db, $sql));
	
	$r_nick = $result;
	if($r_nick == $nick){
		$count = 1;
	}else {
		$count = 0;
	}
	 

	if($result2){
			echo "<script>alert('이메일이 존재합니다') ; history.back();</script>";
	}else if($count == 1){
		echo "<script>alert('중복검사를 해주시길 바랍니다') ; history.back();</script>";
	}
	else if($name == ""){
		echo "<script>alert('이름을 입력해주세요') ; history.back();</script>";
	}else if($nick == ""){
		echo "<script>alert('별명을 입력해주세요') ; history.back();</script>";
	}else if($email == ""){
		echo "<script>alert('이메일 입력해주세요') ; history.back();</script>";
	}else if($pw == ""){
		echo "<script>alert('비빌번호 입력해주세요') ; history.back();</script>";
	}else if($major == ""){
		echo "<script>alert('학과를 선택해주세요') ; history.back();</script>";
	}else if($one == "" || $two == "" || $three == ""){
		echo "<script>alert('전화번호를 입력해주세요'); history.back();</script>";
	}else{
		$sql_user = mq("INSERT INTO sign_check (nick,unique_id,email,pw,name,phonone,phontwo,phonthree,major,bu_major,grade) VALUES ('$nick','$random_id','$email','$pw','$name','$one','$two','$three','$major','$bu_major','$grade')");

		$sql_user2 = mq("INSERT INTO users (unique_id, name, nick, email, status)
        	                                        VALUES ({$random_id}, '{$name}','{$nick}','{$email}','{$status}')");
		// $sql_user2 = mq("INSERT INTO users (unique_id, name, nick, email, status)
        //                                         VALUES ('{$random_id}', '{$name}','{$nick}','{$email}','{$status}')");
		echo "<script>alert('회원가입이 완료되었습니다.'); location.href='index.php';</script>";
	}
?>