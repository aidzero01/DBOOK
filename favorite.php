<?php
	include "db.php";

	$num = $_GET['num']; 
    $f_num = $_POST['f_num'];
    $f_email = $_SESSION['email'];
	$f_title = $_POST['f_title'];
    $imgurl = $_POST['imgurl'];


    $sql_check = "SELECT * FROM favorite WHERE f_num = '$num' and f_email = '$f_email'";
    $res_check = mysqli_fetch_array(mysqli_query($db,$sql_check));
    if($res_check){
        $sql = mq("delete from favorite where f_num='$num' and f_email = '$f_email';");
        $hit = mysqli_fetch_array(mq("select like_cnt from product where num='$num';"));
        $hit = $hit['like_cnt'] - 1;
        $hit = mq("update product set like_cnt = '$hit' where num='$num';"); 

    }else {

        $sql = mq("INSERT INTO favorite (f_email,f_num,f_title,imgurl) VALUES ('$f_email','$num','$f_title','$imgurl');");
        $hit = mysqli_fetch_array(mq("select like_cnt from product where num='$num';"));
        $hit = $hit['like_cnt'] + 1;
        $hit = mq("update product set like_cnt = '$hit' where num='$num';"); 
    }
?>
<script type="text/javascript">
	history.go(-1);
</script>