<?php
    while($row = mysqli_fetch_assoc($sql)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                 OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
                 OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1"; 
        
      
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0){
             $result = $row2['msg'];

             //단어가 28자보다 크면 메시지자름
            (strlen($result) > 28) ? $msg = substr($result, 0, 30). '...' : $msg = $result;
            if($outgoing_id == $row2['outgoing_msg_id']){
                 $you = "<i class='fas fa-share' style='color:#2493e0'></i>";
            }
            else if($outgoing_id == $row2['incoming_msg_id']){
                $you = "<i class='fas fa-reply' style='color:#2493e0'></i>";
            }
            else{
                $you = "";
            }
            // 사용자가 들어와있는지 체크
            ($row['status'] == "활동 중 아님") ? $offline = "offline" : $offline = "";

            $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                        <div class="content">';
                        if($row['img'] == 0){
                            $output .= '<img src="https://kream.co.kr/_nuxt/img/blank_profile.4347742.png" alt="">';
                        }
                        else{
  
                            $output .= '<img src="../profile/'. $row['img'] .'" alt="">';
                        } 
            $output.= '<div class="detalis">
                            <span>'.$row['nick'].'</span>
                            <p>'. $you ." ". $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                        </a>';
        }       
        else{
             $result = "받은 메시지가 없습니다.";
        }
    }


?>