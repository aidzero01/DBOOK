<?php
	include "db.php";

	$one = $_POST['one'];
	$two = $_POST['two'];
	$three = $_POST['three'];
	$now_email = $_GET['email'];

	$sql = "SELECT * FROM sign_check where phontwo='$two'";
    $result = mysqli_fetch_array(mysqli_query($db, $sql));

    $sql2 = "SELECT * FROM sign_check where phonthree='$three'";
    $result2 = mysqli_fetch_array(mysqli_query($db, $sql2));

    if($one == ""){
    	echo "<script>alert('통신사를 입력하시오') ; history.go(-1);</script>";
    }else if($two == ""){
    	echo "<script>alert('2번째 번호를 입력하시오') ; history.go(-1);</script>";
    }else if($three == ""){
    	echo "<script>alert('3번째 번호를 입력하시오') ; history.go(-1);</script>";
    }
    else if($result && $result2){
    	echo "<script>alert('전화번호가 존재합니다') ; history.go(-1);</script>";
    }else{
    	$sql1 = mq("update sign_check set phonone='$one' , phontwo = '$two' , phonthree = '$three' where email = '$now_email'");
    	echo"<script>
    	alert('수정완료되었습니다');
    	window.close();
    	location.href='logout.php';
    	</script>";
    }

?>
<script type="text/javascript">

</script>
