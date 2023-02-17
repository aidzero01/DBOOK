<?php
    session_start();
	include "db.php";

	$now_email = $_GET['email'];
    
    if(isset($_FILES['image'])){ // 만약 파일을 업로드했다면
        $img_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode);

        $extensions = ['png', 'jpeg', 'jpg', 'PNG', 'JPEG', 'JPG'];
        
        if(in_array($img_ext, $extensions) === true){
            $time = time();

            $new_img_name = $time.$img_name;

            if(move_uploaded_file($tmp_name, "profile/".$new_img_name)){
                $sql1 = mq("update users set img='$new_img_name' where email = '$now_email'");  
            
                if($sql1){
                    $sql2 = mq("SELECT * FROM users WHERE img = '{$new_img_name}'");
                    if(mysqli_num_rows($sql2) > 0){
                        $row = mysqli_fetch_assoc($sql2);
                        $_SESSION['unique_id'] = $row['unique_id'];
                        echo"<script>
                            alert('프로필사진이 변경되었습니다');
                            window.close();
                            opener.parent.location.reload();  // 팝업창 닫으면 부모창 새로고침
                            </script>";
                    }
                }
                else{
                    echo "Something went wrong!";
                }
            }
            else{
                echo "temp:".$_FILES['image']['tmp_name'];
            }
        }
        else{
            echo "이미지 파일을 선택하십시오! - png, jpeg, jpg";
        }
    }
    else{
        echo "<script>alert('변경할 사진을 선택해주세요.') ; history.go(-1);</script>";
    }
?>
<script type="text/javascript">

</script>