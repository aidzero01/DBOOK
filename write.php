<!doctype html>
<html lang="en">
<?php
    include "db.php";
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Martine</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <!-- magnific CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/gijgo.min.css">
    <!-- niceselect CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- slick CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/content.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu">
    
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
                                    <li><a href='mypage.php'><img src='img/mypage.png' style="width: 30px; margin:0 0 15px ;"></a></li>
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
        </header>
        <!-- Header part end-->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2>content</h2>
                            <p>home . content user</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
    <!-- about us css start-->
    <section class="about_us section_padding">
        <div class="container">
            <div id="board_write">
                <h1><a href="/">자유게시판</a></h1>
                <h4>글을 작성하는 공간입니다.</h4>
                    <div id="write_area">
                        <form action="write_ok.php" method="post">
                            <input type="hidden" name="num">
                            <div id="in_name">
                                <td><input type="hidden" name="name" value="<?=$_SESSION['email']?>"><?=$_SESSION['email']?></td>
                            </div>
                            <div id="in_title">
                                <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                            </div>
                            <div class="wi_line"></div>
                            <div class="wi_line"></div>
                            <div id="in_content">
                                <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                            </div>
                                <input type="hidden" name="data" id="upw"  placeholder="" required />  
                                <input type="checkbox" name="lock_write" value="1">관리자만 보기
                            <div class="bt_se">
                                <button type="submit">글 작성</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </section>
    <!-- about us css end-->


    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-5">
                    <div class="single-footer-widget">
                        <h4>Discover Destination</h4>
                        <ul>
                            <li><a href="#">Miami, USA</a></li>
                            <li><a href="#">California, USA</a></li>
                            <li><a href="#">London, UK</a></li>
                            <li><a href="#">Saintmartine, Bangladesh</a></li>
                            <li><a href="#">Mount Everast, India</a></li>
                            <li><a href="#">Sidney, Australia</a></li>
                            <li><a href="#">Miami, USA</a></li>
                            <li><a href="#">California, USA</a></li>
                            <li><a href="#">London, UK</a></li>
                            <li><a href="#">Saintmartine, Bangladesh</a></li>
                            <li><a href="#">Mount Everast, India</a></li>
                            <li><a href="#">Sidney, Australia</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="single-footer-widget">
                        <h4>Subscribe Newsletter</h4>
                        <div class="form-wrap" id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                    required="" type="email">
                                <button class="click-btn btn btn-default text-uppercase"> <i class="far fa-paper-plane"></i>
                                </button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                        type="text">
                                </div>

                                <div class="info"></div>
                            </form>
                        </div>
                        <p>Subscribe our newsletter to get update news and offers</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="single-footer-widget footer_icon">
                        <h4>Contact Us</h4>
                        <p>4156, New garden, New York, USA
                                +880 362 352 783</p>
                        <span>contact@martine.com</span>
                        <div class="social-icons">
                            <a href="#"><i class="ti-facebook"></i></a>
                            <a href="#"><i class="ti-twitter-alt"></i></a>
                            <a href="#"><i class="ti-pinterest"></i></a>
                            <a href="#"><i class="ti-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- magnific js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- masonry js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- masonry js -->
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/gijgo.min.js"></script>
    <!-- contact js -->
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/contact.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
        <script type="text/javascript">
         function login() {
            alert("로그인 후 이용해 주시기 바랍니다");
            location.href="login.php";
        }
    </script>
</body>
</html>