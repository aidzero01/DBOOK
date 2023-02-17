<?php
	include "db.php";
	
	$p_num = $_GET['num'];
	$sql = mq("delete from product where num='$p_num';");
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=index.php" />