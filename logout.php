<?php
	session_start();
	if(isset($_SESSION['unique_id'])){
        include_once "db.php";
        $logout_id = mysqli_real_escape_string($db, $_SESSION['unique_id']);
		if(isset($logout_id)){
            $status = "활동 중 아님";
            $sql = mq("UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");
            if($sql){
                session_unset();
                session_destroy();
			}
		}
	}
?>
<script type="text/javascript">
	alert("로그아웃 합니다");
    location.replace('index.php');
</script>
<meta http-equiv="refresh" content="0;url=main.php">