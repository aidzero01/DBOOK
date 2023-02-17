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
    .checkbox_all {
        position: relative;
        margin-left: auto;
        display: -webkit-box;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: flex-end;
    } 
    .checked {
         padding:0 5px;
    }
    .checked1{
        margin-right: 3px;
    }
    .delete{
        border:1px solid gray;
         border-radius: 10px;
         font-size: 12px;
         padding:0 12px; 
         background: white;
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
                <div class="ment" style="overflow: auto;height: 700px;">
                    <?php
                    $uid= $_SESSION["email"]; 
                    $sql= mq("SELECT * FROM favorite where f_email='$uid'");

                    $sql2 = mq("SELECT * FROM favorite where f_email='$uid'");

                    $favorite= mysqli_num_rows($sql2);

                    $result2 = mysqli_fetch_array($sql2);

                    

                    ?>
                    <div class="profile-top" style="border-bottom: 3px solid #222;padding-bottom: 16px;">
                        <h3><strong>찜한 내역 / 갯수 : <?php echo $favorite ?></strong></h3>
                        <div class="checkbox_all">
                            <div class="checked">
                                <input type="checkbox" class="checked1" name="" id="product" onclick='selectAll(this)'><span>전체선택 |</span>
                            </div>
                            <div>
                                <form action="favorite_delete.php" method="post">
                                    <input type="hidden" name="f_num[]" id="aaa" value="">
                                    <button type="submit" class="delete" onclick="folderDeleteClick()">삭제</button>    
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    
                    while($result = mysqli_fetch_array($sql)){
                        
                    ?>
                     <!-- // 찜한 내역 표시 //  -->
        
                    <div class="ment-profile">
                        <div class="ment-content">
                           <div class="ment-group">
                               <div class="ment-img">
                               <img src="<?php echo $result['imgurl'] ?>" width="100px"; height="100px">
                           </div>
                           <div class="ment-info ment-info-full">
                                <strong class="ment-info ment-name">상품 이름 : <?php echo $result['f_title'] ?></strong>
                                <p class="ment-info ment-email"  style="line-height: 35px;"><strong style="color:black">상품 등록자명 : </strong><?php echo $result['f_email'] ?></p>
                                <p class="ment-info ment-email" style="line-height: 35px;"><strong style="color:black">상품번호</strong>(<?php echo $result['f_num'] ?>)</p>
                            
                           </div>
                           <div class="ment-ship">
                               <div class="ment-ship-p">
                                    <a href="product_sale.php?num=<?php echo $result['f_num']; ?>"><button style="border:1px solid gray; border-radius: 10px;font-size: 12px;padding:0 12px; background: white;">상품 상세보기</button></a>
                               </div>
                               <div class="ment-ship-p" style="width:30px">
                                    <input type="checkbox" name="product" id="product" value="<?php echo $result['f_num']?>" >
                               </div>
                           </div>
                           </div>
                        </div>
                    </div>
                    <?php
                       
                    }
                    if($favorite == 0){
                    ?>
                    <div class="sell_good">
                        <p>※ 찜한 상품이 없습니다. ※</p>
                    </div>
                    <div  style="text-align: right;">
                        <a href="packages.php">상품보러가기</a>
                    </div>
                    <?php
                    }
                    ?>

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
    <script type="text/javascript">
        $(document).ready(function() {
          $("#product").click(function() {
                if($("#product").is(":checked")) $("input[name=product]").prop("checked", true);
                else $("input[name=product]").prop("checked", false);
            });
        });

        var chkrr = [];
        function folderDeleteClick(){
            $("input[name=product]:checked").each(function() {
                var chk = $(this).val();
                chkrr.push(chk);
                $("#aaa").val(chkrr);
            })
        }


    </script>
</body>

</html>