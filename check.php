<?php


    include "db.php";

    $nick= $_GET["nick"];  //GET으로 넘긴 userid
    $sql= "SELECT * FROM sign_check where nick='$nick'";
    $result = mysqli_fetch_array(mysqli_query($db, $sql));
    
    if(!$result){
        echo "<span style='color:blue;'>$nick</span> 는 사용 가능한 아이디입니다.";
       ?><p><input id="col" type="button" value="이 ID 사용" onclick="opener.parent.decide();" onclick="opener.parent.close(); "></p>
    <?php
    } else {
        echo "<span style='color:red;'>$nick</span> 는 중복된 아이디입니다.";
        ?><p><input type="button" value="다른 ID 사용" onclick="opener.parent.change(); window.close()"></p>
    <?php
    }
?>