<?php
	include "db.php";

	$name = $_POST['name'];
	$now_email = $_GET['email'];

	$sql = "SELECT * FROM sign_check where name='$name'";
    $result = mysqli_fetch_array(mysqli_query($db, $sql));
    
    if($name == ""){
    	echo "<script>alert('변경할 이름을 입력해주세요') ; history.go(-1);</script>";
    }
    else if($result){
    	echo "<script>alert('이름이 존재합니다') ; history.go(-1);</script>";
    }
    else{
    	$sql1 = mq("update sign_check set name='$name' where email = '$now_email'");
        $sql1 = mq("update users set name='$name' where email = '$now_email'");
    	echo"<script>
    	alert('수정완료되었습니다');
    	window.close();
    	location.href='logout.php';
    	</script>";
    }

?>
<script type="text/javascript">

</script>
