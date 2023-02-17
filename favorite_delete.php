<?php
include "db.php";

$f_num = $_POST['f_num'];
// 넘겨 받은 값이 배열로 저장됨


$arr_num = implode(",",$f_num);
$sql = mq("delete from favorite where f_num='$arr_num';");
$hit = mysqli_fetch_array(mq("select like_cnt from product where num='$arr_num';"));
$hit = $hit['like_cnt'] - 1;
$hit = mq("update product set like_cnt = '$hit' where num='$arr_num';");

?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=index.php" />