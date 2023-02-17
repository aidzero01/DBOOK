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
<style type="text/css">
    .wrap_cont .wrap_tip{
        color: black;
        font-size: medium;
    }
b, strong {
    font-weight: bolder;
    font-size: large;
    color: black;
}
.col-lg-4 {
    -ms-flex: 0 0 60%;
    flex: 0 0 60%;
    max-width: 60%;
}


.num_info {
    color: #0c3e72;
    font-size: 20px;
    margin: 0;
    float: left;
    width: 55px;
    margin: 0;
    font-size: 22px;
}

.tit_info{
    font-size:22px;
    font-family: "Open Sans", sans-serif;


    
}
#drop-content #drop-content1 #drop-content2 #drop-content3{
    margin-left:55px;

}

.sub{
    font-size:18px;
    margin-left: 60px;
    color:grey;
    font-weight: 530;
       padding-bottom: 10px;

}
li{
    padding-bottom: 20px;

}
</style>
<body>
   <!--::header part start::-->
   <header class="main_menu">
        <?php include "header.php" ?>;
    </header>
    <!-- Header part end-->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2>오시는 길</h2>
                            <p>Home . contact user</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <div id="map" style="height: 480px;"></div>
                <script>
                    function initMap() {
                        var uluru = {
                            lat: 35.1430,
                            lng: 129.0341
                        };
                        var grayStyles = [{
                            featureType: "all",
                            stylers: [{
                                saturation: -90
                            }, {
                                lightness: 50
                            }]
                        }, {
                            elementType: 'labels.text.fill',
                            stylers: [{
                                color: '#ccdee9'
                            }]
                        }];
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {
                                lat: 35.1430,
                                lng: 129.0341
                            },
                            zoom: 15,
                            styles: grayStyles,
                            scrollwheel: true
                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
                </script>

            </div>

            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">고객센터</h2>
                </div>
                <div class="col-lg-8" style="max-width: 40%;">
                    <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">

                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder='Enter Message'></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder='Enter Subject'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm btn_1">Send Message</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4" style="max-width: 60%;">
            <ol class="wrap_cont wrap_tip" style="list-style: none;">
                <li class="item_info">
                    <a class="link_cont" onclick="dp_menu()">
                        <span class="num_info"> 1 </span>
                        <strong class="tit_info" style="display: block;">
                            [계정] 아이디/비밀번호를 잊어버렸어요!
                        </strong>
                         <span id="drop-content" class="sub" style="display: none; ">
                         왼쪽의 고객센터 폼으로 문의주세요.
                        </span>
                    </a>
                   
                </li>
                <li class="item_info">
                    <a class="link_cont" onclick="dp_menu1()">
                        <span class="num_info"> 2 </span>
                        <strong class="tit_info" style="display: block;">
                            [판매자와 연락] 판매자와 어떻게 연락하나요?
                        </strong>
                        <span id="drop-content1" class="sub" style="display: none;">
                            물품의 채팅기능을 이용하시면 편하게 연락하실 수 있습니다.
                        </span>
                    </a>
                </li>
                <li class="item_info">
                    <a class="link_cont" onclick="dp_menu2()">
                        <span class="num_info"> 3 </span>
                        <strong class="tit_info" style="display: block;">
                            [찜] 찜한 목록은 어디서 볼 수 있나요?
                        </strong>
                        <span id="drop-content2" class="sub" style="display: none;">
                            마이페이지에서 찾으실 수 있습니다.
                        </span>
                    </a>
                </li>
                <li class="item_info">
                    <a class="link_cont" onclick="dp_menu3()">
                       <span class="num_info"> 4 </span>
                        <strong class="tit_info" style="display: block;">
                            [길찾기] 길은 어떻게 찾아가나요?
                        </strong>
                        <span id="drop-content3" class="sub" style="display: none;">
                            위의 구글 지도를 이용해주세요
                        </span>
                    </a>
                </li>
               
            </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

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
                            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" required="" type="email">
                                <button class="click-btn btn btn-default text-uppercase"> <i class="far fa-paper-plane"></i>
                                </button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
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
                        <p>4156, New garden, New York, USA +880 362 352 783</p>
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
        function login() {
            alert("로그인 후 이용해 주시기 바랍니다");
            location.href="login.php";
        }

        function dp_menu(){
            let click = document.getElementById("drop-content");
            let c = document.getElementById("tit_info");
            if(click.style.display === "none"){
                click.style.display = "block";
                c.style.display = "none";
 
            }else{
                click.style.display = "none";
                c.style.display = "block";
 
            }
        }
        function dp_menu1(){
            let click = document.getElementById("drop-content1");
            if(click.style.display === "none"){
                click.style.display = "block";
 
            }else{
                click.style.display = "none";
 
            }
        }
        function dp_menu2(){
            let click = document.getElementById("drop-content2");
            if(click.style.display === "none"){
                click.style.display = "block";
 
            }else{
                click.style.display = "none";
 
            }
        }
        function dp_menu3(){
            let click = document.getElementById("drop-content3");
            if(click.style.display === "none"){
                click.style.display = "block";
 
            }else{
                click.style.display = "none";
 
            }
        }
    </script>
</body>

</html>