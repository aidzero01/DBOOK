<?php
    session_start();
    include_once "config.php";
    //var_dump($_SESSION);
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM users
                                WHERE NOT unique_id = {$outgoing_id}");
    // $sql = mysqli_query($conn, "SELECT * FROM users
    //                     INNER JOIN messages ON users.unique_id = messages.outgoing_msg_id
    //                     WHERE (incoming_msg_id = {$outgoing_id}) OR (outgoing_msg_id = {$outgoing_id})" );
   // $query = mysqli_query($conn, $sql);
    $output = "";
    // $count =  mysqli_num_rows($sql);
    // echo $count;
    // $row = mysqli_fetch_assoc($sql);
    if(mysqli_num_rows($sql) == 0){
        $output .= "대화기록이 없습니다.";
    }
    else if(mysqli_num_rows($sql) > 0){
        include "data.php";
    }
    echo $output;
?>