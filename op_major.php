<?php
	include "db.php";

	$major = $_POST['p_major'];
    $bu_major = $_POST['bu_major'];
	$now_email = $_GET['email'];

	$sql = "SELECT * FROM sign_check where major='$major'";
    $sql2 = "SELECT * FROM sign_check where bu_major='$bu_major'";

    $result2 = mysqli_fetch_array(mysqli_query($db, $sql2)); 
    $result = mysqli_fetch_array(mysqli_query($db, $sql));
    
   
	$sql1 = mq("update sign_check set major='$major' , bu_major = '$bu_major' where email = '$now_email'");
    $sql1 = mq("update product set major='$major' , bu_major = '$bu_major' where p_email = '$now_email'");
    
	echo"<script>
	alert('수정완료되었습니다');
	window.close();
	location.href='logout.php';
	</script>";


?>
<script type="text/javascript">

</script>
