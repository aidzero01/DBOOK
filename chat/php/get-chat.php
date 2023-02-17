<?php
   session_start();
   if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        $sql = "SELECT * FROM messages
                LEFT JOIN users ON users.unique_id = messages.incoming_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){    // 메시지의 outgoing_msg_id가 $outgoing_id 이라면 메시지 보낸 사람임 
                    $output .= '<div class="chat outgoing">
                                    <div class="detalis">
                                        <p style="background-color:#2493e0">'.$row['msg'] .'</p>
                                    </div>
                                </div>';
                }
                else{   // 만족하지 않는다면 받는 사람
                    $output .= ' <div class="chat incoming">
                                    <div class="detalis">
                                        <p>'.$row['msg'] .'</p>
                                    </div>
                                </div>';
                }
            }
            echo $output;
        }
   }
   else{
       header("../login.php");
   }
?>