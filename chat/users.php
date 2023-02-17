<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: ../login.php");
    }
?> 

<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="users">
           <header>
            <?php
                include_once "php/config.php";
                
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }

            ?>
            <div class="content">
                <?php 
                    if($row['img'] == 0){?>
                        <img src="https://kream.co.kr/_nuxt/img/blank_profile.4347742.png" alt="">
                <?php } 
                    else{ ?>   
                       <img src="../profile/<?php echo $row['img']?>" alt="">
                <?php } ?>

                <div class="detalis">
                    <span><?php echo $row['nick'] ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            </div>
           </header>
           <div class="search">
            <span class="text">Select an user to start chat</span>
            <input type="text" placeholder="대화상대의 닉네임을 입력하세요.">
            <button><i class="fas fa-search" ></i></button>
           </div>
           <div class="users-list">
            
           </div>
        </section>
    </div>
    
    <script src="js/users.js"></script>
</body>
</html>