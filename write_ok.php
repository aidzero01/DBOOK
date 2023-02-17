<?php

include "db.php";

//각 변수에 write.php에서 input name값들을 저장한다
$num = $_POST['num'];
$name = $_POST['name'];
$title = $_POST['title'];
$content = $_POST['content'];
$data = date('Y-m-d H:i:s');


if(isset($_POST['lock_write'])){
    $lock = '1';
}else{
    $lock = '0';
}

if($title  && $content){
    $sql_board = mq("INSERT INTO board (name,title,data,content,lock_write) VALUES ('$name','$title','$data','$content','$lock')");
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='about.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>