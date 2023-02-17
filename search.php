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
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu">
        <?php include "header.php"; ?>
    </header>
    <!-- Header part end-->

    <!-- breadcrumb start-->
<!--     <section class="breadcrumb breadcrumb_bg">
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
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section_tittle text-center">
                        <h2>SHOP</h2>
                    </div>
                </div>
            </div>


            <div class="row">
                
                
    <?php
    if(isset($_POST['searchtag'])){
        $title = $_POST['searchtag'];
        $sql = "select * from product where p_title like '$title%';";
        $result = mysqli_query($db,$sql);  
        $row = mysqli_num_rows($result);  
    } 
    else if(isset($_POST['p_major'])){
        $grade = $_POST['p_grade']; 
        $major= $_POST['p_major']; 
        $bu_major= $_POST['bu_major'];
        /*echo $_POST['bu_major'];*/
        $title = $_POST['p_title'];
        $sql = "select * from product where p_bu_major='$bu_major' and p_major='$major' and p_grade = '$grade' and p_title like '$title%';";
        $result = mysqli_query($db,$sql);   
        $row = mysqli_num_rows($result);
    }
?>
     <?php
        while($data = mysqli_fetch_array($result)){
                if($data['p_sell'] == 1){
             ?>
        <div class="col-lg-3 col-sm-3">
            <div class="single_ihotel_list">
                <a href="product_sale.php?num=<?php echo $data["num"];?>"> <img src="./uploads/<?php echo  $data['filename']; ?>" width="150px" height="200px"></a><br>
                <div class="hover_text">                                
                </div>
                <div class="hotel_text_iner">
                    <h4><span>책 제목 :</span><a href="product_sale.php?num=<?php echo $data["num"];?>"><?php echo  $data['p_title']; ?></a></h4>
                    <p><span style="color:black">등록자 : </span> <?php echo  $data['p_nick']; ?></p>
                    <p><span style="color:black">사용 학과 : </span> <?php echo  $data['p_major']; ?></p>
                    <p><span style="color:black">사용 학년 : </span><?php echo  $data['p_grade']."학년"; ?></p>
                    <p><span style="color:black">책 상태 : </span> <?php echo  $data['p_condition']; ?></p>
                    <p><span style="color:black">출판사 : </span><?php echo  $data['p_fan']; ?></p>
                    <h5>가격 : <span><?php echo  $data['p_price']; ?>원</span></h5>
                </div>
            </div>
        </div>
        <?php
           }else {
                    ?>
                    <div class="col-lg-3 col-sm-3 sell">
                        <div class="single_ihotel_list">
                            <img class="sell-img" src="./img/soldout.png" style="width: 100% ; height: 200px;">
                            <div class="hover_text">                                
                            </div>
                            <div class="hotel_text_iner">
                                <h4>  <span>책 제목 :</span><?php echo  $data['p_title']; ?></h4>
                                <p><span style="color:black">등록자 : </span> <?php echo  $data['p_email']; ?></p>
                                <p><span style="color:black">사용 학과 : </span> <?php echo  $data['p_major']; ?></p>
                                <p><span style="color:black">책 상태 : </span> <?php echo  $data['p_condition']; ?></p>
                                <p><span style="color:black">출판사 : </span><?php echo  $data['p_fan']; ?></p>
                                <h5>가격 : <span><?php echo  $data['p_price']; ?>원</span></h5>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                }
                if($row == 0){
                    ?>
                    <div style="border-top: 1px solid gray;width: 100%;">
                        <div style="text-align: center;">
                            <h1 style="color:gray;padding: 30px 0;">※데이터가 존재하지않습니다.※</h1>
                        </div>
                    </div>
                    <?php
                }
            ?>
    </div>
  </section>

    <!-- footer part start-->
    <footer class="footer-area" style="background-color: #08223a;">
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
</body>

</html>