<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>  
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="chat-area" >
            <header>
                <?php
                    include_once "php/config.php";
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                    if(mysqli_num_rows($sql) > 0){
                        
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <?php 
                    if($row['img'] == 0){?>
                        <img src="https://kream.co.kr/_nuxt/img/blank_profile.4347742.png" alt="">
                <?php } 
                    else{ ?>   
                       <img src="../profile/<?php echo $row['img']?>" alt="">
                <?php } ?>
                <div class="detalis" style="justify-content: space-between">
                    <span style="font-size:20px"><?php echo $row['nick'] ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
                <!-- <div align-item="flex-end">
                    <button ><a href="users.php" class="logout"></a>채팅방 나가기</button>
                </div> -->
            </header>
            <div class="chat-box">
            </div>
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="메시지 입력..." >
                <button style="background-color:#08223a"><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="js/chat.js"></script>
</body>
</html>