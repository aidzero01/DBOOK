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
    <link rel="stylesheet" href="css/style.css?after">
    <link rel="stylesheet" href="css/sale.css">
    <style type="text/css">
        .row {
            margin-right: 25px;
        }
    </style>
</head>

<body>
    <!--::header part start::-->
   <header class="main_menu">
       <?php include "header.php"?>
    </header>
    <!-- Header part end-->

    <!-- breadcrumb start-->
   <!--  <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2>Packages</h2>
                            <p>home . Packages</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- breadcrumb start-->

    <!-- about us css start-->
    <section class="hotel_list section_padding single_page_hotel_list">
        <div class="container">
             <?php
                $p_num = $_GET['num'];
                $sql = mq("select * from product where num = '$p_num'");
                $data = $sql -> fetch_array();
                ?>

            <div class="row" style="float:left;">
                <div class="row_img" style="">
                    <?php

                    if($data['p_sell'] == 0){
                        ?>
                        <img src="./img/soldout.png" style="width: 530px; padding:0 30px 0 30px; " >
                        <?php
                    }else {
                        ?>
                        <img src="<?php echo  $data['imgurl']; ?>" style="width: 530px;height: 560px; padding:0 30px 0 30px;" >
                        <?php
                    }
                    ?>
                    
                </div>
            </div> 
            <div class="row" style="height: 560px;">
                    <div class="col-lg-3 col-sm-3">
                        <div class="single_ihotel_list">
                            <div class="hover_text">                                
                            </div>
                            <div class="hotel_text_iner" style="width: 560px; height: 560px; padding: 0px;">
                                <h4>  <span>책 제목 :</span><a href="#"><?php echo  $data['p_title']; ?></a></h4>
                                <p><span style="color:black">등록자 : </span><?php echo  $data['p_email']; ?></p>
                                <p><span style="color:black">사용 학년 : </span><?php echo  $data['p_grade']; ?>학년</p>
                                <p><span style="color:black">사용 학과 : </span><?php echo  $data['p_major']; ?> <span style="color:black"> / </span><?php echo  $data['p_bu_major']; ?></p>
                                <p><span style="color:black">출판사 : </span><?php echo  $data['p_fan']; ?></p>          
                                <p><span style="color:black">책 상태 : </span> <?php echo  $data['p_condition']; ?></p>
                                <p><span style="color:black">판매자 한마디 : </span><span class="sale-content"><?php echo  $data['p_content']; ?></span></p>
                                <p class="favorite">
                                    <ul class="favorite-ul">
                                        <li class="favorite-price"><strong class="price">가격</strong><span class="price-won"><?php echo  $data['p_price']; ?>원</span></li>
                                        <?php
                                        if($data['p_sell'] == 0){
                                            ?>
                                            <p style="color:black;">판매종료 : <span style="color:gray">(<?php echo  $data['p_sell']; ?>)</span></p>
                                            <?php
                                        }else {
                                            ?>
                                             <button class="favorite-chat" onclick="window.open(this.href='chat/chat.php?user_id=<?php echo $data['p_unique_id'] ?>','test','width=460,height=700,left=1000px, top = 300px,scrollbars=no'); return false;"><li>메시지보내기 <i class='fas fa-comment-dots' style='font-size:30px;color:white'></i></li> </button>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </p>
                             <?php
                                if($data['p_sell'] == 0){
                                    ?>
                                     <p class="favorite"><button class="favorite-button " type="button" onclick="location.href='product_delete.php?num=<?php echo $data['num']?>' ">상품 등록 해제</button></p>
                                    <?php
                                }else{
                                    if(isset($_SESSION['email'])){
                                        $uid = $_SESSION['email'];

                                        $sql2 = mq("select * from favorite where f_num = '$p_num' && f_email = '$uid'");
                                        $user = $sql2 -> fetch_array();
                                        if($data['p_email'] == $_SESSION['email']){
                                        ?>
                                        <p class="favorite"><button class="favorite-button " type="button" onclick="location.href='product_delete.php?num=<?php echo $data['num']?>' ">상품 등록 해제</button></p>
                                        <?php
                                        }else {
                                            ?>
                                            <form action="favorite.php?num=<?php echo $data['num']; ?>" method="post">
                                        <input type="hidden" name="f_title" value="<?php echo $data['p_title']?>">
                                        <input type="hidden" name="f_email" value="<?php echo $_SESSION['email']?>">
                                        <input type="hidden" name="f_num" value="<?php echo $data['num']?>">
                                        <input type="hidden" name="imgurl" value="<?php echo $data['imgurl']?>">
                                            <p class="favorite"><button type="submit" class="favorite-button" >찜하기 
                                            <?php
                                                if($user){
                                                    ?>
                                                    <span>♥<?php echo $data['like_cnt']?></span>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <span>♡<?php echo $data['like_cnt']?></span>
                                                    <?php
                                                }
                                            ?>
                                            </button></p>
                                            </form>
                                            <?php
                                        }
                                    }else {
                                    ?>
                                    <form action="favorite.php?num=<?php echo $data['num']; ?>" method="post">
                                        <input type="hidden" name="f_title" value="<?php echo $data['p_title']?>">
                                        <input type="hidden" name="f_email" value="<?php echo $_SESSION['email']?>">
                                        <input type="hidden" name="f_num" value="<?php echo $data['num']?>">
                                        <input type="hidden" name="imgurl" value="<?php echo $data['imgurl']?>">
                            <p class="favorite"><a href="#" onclick="login();"><button type="button" class="favorite-button" >찜하기<span>♡<?php echo $data['like_cnt']?></span></button></a></p>
                                     </form>
                                    <?php
                                        }
                                    }
                                 ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

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
    <script src="js/custom.js">
    </script>
        <script type="text/javascript">
            const target = document.getElementById('target_btn');
  target.disabled = true;

         function login() {
            alert("로그인 후 이용해 주시기 바랍니다");
            history.go(-1);
            location.href="login.php";
        }

    </script>
</body>

</html>