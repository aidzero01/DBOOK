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
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sale.css?after">
    <style type="text/css">
        .col-lg-3 col-sm-3 {
            margin-top:0px;
            flex: 0 0 25%;
            max-width: 25%;
        }
        .col-sm-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%;
        }
        .col-fav {
            flex: 0 0 25%;
            max-width: 25%;   
        }
    </style>
</head>

<body>
   <!--::header part start::-->
   <header class="main_menu" style="margin:30px 0 30px 0 ;">
        <div class="sub_menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="sub_menu_right_content">
                            <a href="index.php"><img src="img/logo.png" width="105px"></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="sub_menu_social_icon">
                            <a href="#"><i class="flaticon-facebook"></i></a>
                            <a href="#"><i class="flaticon-twitter"></i></a>
                            <a href="#"><i class="flaticon-skype"></i></a>
                            <a href="#"><i class="flaticon-instagram"></i></a>
                            <span><i class="flaticon-phone-call"></i>+880 356 257 142</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->
<!-- 
<?php
                if(!isset($_SESSION['email'])){
                    echo"<a href='login.php' class=''>Login</a>";    

                }else {
                    $name = $_SESSION['name'];
                    $nick = $_SESSION['nick'];
                    $email = $_SESSION['email'];
                    echo"<p>$nick</p>";
                    echo"<p>$name</p>";     
                }
                $sql2 = mq("SELECT * FROM users WHERE email = '$email'");
                $row = mysqli_fetch_array($sql2);
    ?>
                 -->
    <!-- banner part start-->
    <section class="banner_part">
        <div class="main">
            <div class="mypage">
                <div class="user">
                    <h3 style="height: 45px;"><a href="mypage.php" style="color:black;"><strong>마이 페이지</strong></a></h3>
                    <ul class="user-font">
                        <li style="margin-bottom: 12px;"><p style="color:black;font-size: 18px;"><strong>쇼핑 정보</strong></p></li>
                        <li style="margin-bottom: 12px;font-size: 15px;"><a href="sale_info.php" style="color: rgba(34,34,34,.5);">판매 내역</a></li>
                       <li style="margin-bottom: 12px;font-size: 15px;"><a href="favorite_info.php" style="color: rgba(34,34,34,.5);">찜한 내역</a></li>
                        <li style="margin-bottom: 12px;font-size: 15px;"><a href="profile.php?p_email=<?php echo $_SESSION['email'];?>" style="color: rgba(34,34,34,.5);">프로필 수정</a></li>
                    </ul>
                </div>
                <div class="ment">
                    <div class="ment-h3">
                        <div class="ment-content">
                           <div class="ment-group">
                               <div class="ment-img">
                               <?php 
                                    if($row['img'] == 0){?>
                                        <img src="https://kream.co.kr/_nuxt/img/blank_profile.4347742.png" width="100px"; height="100px" alt="">
                                <?php } 
                                    else{ ?>   
                                    <img src="./profile/<?php echo $row['img']?>" width="100px"; height="100px" alt="">
                                <?php } ?>
                           </div>
                           <div class="ment-info ment-info-full">
                                <strong class="ment-info ment-name"><?php echo "$name" ?></strong>
                                <p class="ment-info ment-email"><?php echo "$email" ?></p>
                                <div class="ment-updata ment-pokit">
                                    <a href="profile.php?p_email=<?php echo $_SESSION['email'];?>" class="ment-updata-a">프로필 수정</a>
                                </div>
                                <div class="ment-logout ment-pokit">
                                    <a href="logout.php" class="ment-updata-a">로그 아웃</a>
                                </div>
                           </div>
                           <div class="ment-ship">
                               <div class="ment-ship-p">
                                    <p style="color:black"><strong>일반 회원</strong></p>
                                    <p style="font-size: 14px;">회원 등급</p>
                               </div>
                           </div>
                           </div>
                        </div>
                    </div>
                     <div class="ment-sale">
                        <h3>보관 판매 내역</h3>
                        <ul class="ul-sale">
                         <div class="row">
                             <?php

                            $uid= $_SESSION["email"]; 
                            $sql= "SELECT * FROM product where p_email='$uid'";

                            $total_rows = mysqli_num_rows(mysqli_query($db, $sql));

                            $sql2 = "SELECT * FROM product where p_email='$uid' && p_sell='0'";
                            $sql3 = "SELECT * FROM product where p_email='$uid' && p_sell='1'";
                            $sql4 = "SELECT * FROM favorite where f_email='$uid'";

                            $favor = mysqli_num_rows(mysqli_query($db,$sql4));
                            $sell = mysqli_num_rows(mysqli_query($db,$sql2));
                            $selling = mysqli_num_rows(mysqli_query($db,$sql3));
                            
                                ?>
                                <div class="col-lg-3 col-sm-3">
                                    <div class="single_ihotel_list mypage-sell mypage-before">
                                        <p>판매 중</p>
                                       <span><?php echo $selling ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-3">
                                    <div class="single_ihotel_list mypage-sell mypage-before">
                                        <p>판매 완료</p>
                                       <span><?php echo $sell ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-3">
                                    <div class="single_ihotel_list mypage-sell mypage-before">
                                        <p>판매 대기</p>
                                       <span>?</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-3">
                                    <div class="single_ihotel_list mypage-sell">
                                        <p>총 판매상품</p>
                                       <span><?php echo $total_rows ?></span>
                                    </div>
                                </div>
                            </div>  
                        </ul>
                    </div>
                     <div class="ment-sale">
                        <h3>찜한 내역</h3>
                        <ul class="ul-sale col-fav">
                        <div class="single_ihotel_list mypage-sell mypage-before">
                            <p>찜한 내역</p>
                           <span><?php echo $favor ?></span>
                        </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- booking part start-->
    <section class="booking_part">
        <div class="container">
            <div class="row">
    
            </div>
        </div>
    </section>
    <!-- Header part end-->


    <!--::industries end::-->
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
    <div class="chatbot">
        <div>
            <div>
                
            </div>
        </div>
    </div>
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
</body>

</html>