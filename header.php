<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
        <div class="main_menu_iner">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                            <a class="navbar-brand" href="index.php"> <img src="img/logo.png" alt="logo"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse main-menu-item "
                                id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <div class="nav-link">
                                            <div class="nav-web">
                                                <form action="./search.php" method="post">
                                                <input type="text" name="searchtag" class="search line1">
                                                 <button style="padding:0;" type="submit" class="btn btn-black" data-toggle="modal" data-target="#tallsearchModal"><i class="fa fa-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.php">게시판</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="packages.php">북스토어</a>
                                    </li>
                                   
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.php">오시는 길</a>
                                    </li>

                                    <?php
                                    if(!isset($_SESSION['email'])){
                                         ?>
                                        <li class="nav-item">
                                        <a class="nav-link" href="login.php" onclick="login();">상품등록</a>
                                        </li>
                                        <?php
                                    }else {
                                        ?>
                                        <li class="nav-item">
                                        <a class="nav-link" href="product.php">상품등록</a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                  <?php if(!isset($_SESSION['email'])) {?>
                                        <li class="nav-item">      
                                            <a class="nav-link" href="login.php" onclick="login();">채팅 목록</a>
                                        </li>
                                    <?php } else { ?>
                                        <li class="nav-item">      
                                            <a class="nav-link" onclick="window.open(this.href='chat/users.php','채팅목록','width=460,height=700,left=1000,scrollbars=no'); return false;">채팅 목록</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="login-ment">
                            <?php
                            if(!isset($_SESSION['email'])){
                                echo"<a href='login.php' class='btn_1 d-lg-block'>Login</a>";    
                            }else {
                                $name = $_SESSION['name'];
                                $nick = $_SESSION['nick'];
                                ?>
                            </div>
                            <div class="logout-ment">
                                <ul class="right_menu">
                                    <li class="right_menu_bef"><a href='logout.php' class='btn_1 d-lg-block'>LOGOUT</a></li>
                                    <li><a href='mypage.php'><i class='far fa-user-circle' style='font-size:36px'></i></a></li>
                                </ul>
                                <?php
                            }
                            ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
</body>
<script type="text/javascript">
    function login() {
        alert("로그인 해주시기 바랍니다");
    }
</script>
</html>