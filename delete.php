<?php
	include "db.php";
	
	$b_num = $_GET['num'];
	$sql = mq("delete from board where num='$b_num';");
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=index.php" />