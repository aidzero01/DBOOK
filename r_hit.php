<?php
	include "db.php";
   
	$r_num = $_GET['num'];
    $r_hit = mysqli_fetch_array(mq("select r_hit from replay where num='$r_num';"));
    $r_hit = $r_hit['r_hit'] + 1;

    if(!isset($_SESSION['email'])){
        echo" <script>alert('로그인 해주시기 바랍니다'); location.href='login.php'</script>";
    }else{
        $sql = mq("update replay set r_hit='$r_hit' where num='$r_num';");    

        echo"<script >alert('추천되었습니다.'); history.go(-1);</script> ";
    }
        
    ?>
