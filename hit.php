<?php
	include "db.php";
   
	$b_num = $_GET['num'];
    $hit = mysqli_fetch_array(mq("select hit from board where num='$b_num';"));
    $hit = $hit['hit'] + 1;
    
    if(!isset($_SESSION['email'])){
        echo" <script>alert('로그인 해주시기 바랍니다'); location.href='login.php'</script>";
    }else{
        mq("update board set hit='$hit' where num='$b_num';");    
        echo"<script >alert('추천되었습니다.);</script>";
    }
        
    ?>
    <meta http-equiv="refresh" content="0 url=about.php" />