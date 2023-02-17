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
    <link rel="stylesheet" href="css/content.css?after">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu">
       <?php include "header.php"?>
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
	<?php
    	$b_num = $_GET['num'];
    	$view = mq("update board set view = view +1 where num = '$b_num'");
    	$sql = mq("select * from board where num = '$b_num'");
    	$board = $sql -> fetch_array();
    ?>

    <!-- about us css start-->
    <section class="about_us section_padding">
        <div class="container">
            <div class="read">
                <h1>--- 글쓰기 ---</h1>
            	<ul>
                    <li>작성자 : <?php echo $board['name']?></li>
                    <p>제목 : <?php echo $board['title']?></p>
                    <li>내용 :</li>
                    <li><?php echo $board['content']?></li>
                </ul>
            </div>
            <div>
                <?php
            if(!isset($_SESSION['email'])){
                ?>
                <button ><a href="hit.php?num=<?php echo $board['num']; ?>">추천</a></button>
                <?php
            }else{
                ?>
                <button><a href="hit.php?num=<?php echo $board['num']; ?>">추천</a></button>
                <?php
                if($_SESSION['email'] == $board['name'] || $_SESSION['email'] == "admin@deu.co.kr"){
                    ?>
                    <button><a href="board_updata.php?num=<?php echo $board['num']; ?>">수정</a></button>
                   <button><a href="delete.php?num=<?php echo $board['num']; ?>">삭제</a></button>
                    <?php
                }else {
                    
                }
            }
            ?>
            </div>
            <h1>---- 댓글 ----</h1>
            <?php
               $sql3 = mq("SELECT * FROM replay where cn_num = '$b_num' ");
               while($replay = $sql3->fetch_array()){

            ?> 
            <!--  댓글 입력 부분 삭제 추천 비추천 -->
            <div>
                <div>
                    <ul style="border-top: 1px solid black;">
                    <li>작성자 : <?php echo $replay['r_name']?> - <?php echo $replay['r_date']?> </li>
                    <li>내용 : <?php echo $replay['r_content']?></li>
                    <li style=""><button ><a href="r_hit.php?num=<?php echo $replay['num'];?>">추천</a></button><?php echo $replay['r_hit']?><button ><a href="r_hit_down.php?num=<?php echo $replay['num'];?>">비추천</a></button></li>
                    <li>
                        <form action="replay_delete.php?num=<?php echo $board['num']; ?>" method="post">
                            <input type="hidden" name="b_num" value="<?php echo $replay['num']?>">
                            <input type="hidden" name="cn_num" value="<?php echo $board['num']?>">
                            <?php
                                if(!isset($_SESSION['email'])){

                                }else{
                                    if($_SESSION['email'] == $replay['r_name']){

                                    ?>
                                    <button>삭제</button>
                                    <?php
                                    }
                                }
                            ?>
                            
                        </form>
                    </li>

                    </ul>
                </div>
            <?php
                }
            ?>  
                <div style="margin-top: 50px;">
                    <form action="replay_ok.php?num=<?php echo $b_num; ?>" method="post">
                        <input type="hidden" name="r_name" value="<?=$_SESSION['email']?>">
                        <input type="hidden" name="r_date">
                        <textarea name="r_content"></textarea>
                        <button type="submit">댓글</button>
                    </form>
                </div>
                <div><button><a href="about.php">목록으로</a></button></div>
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
    <script src="js/custom.js">
    </script>
        <script type="text/javascript">
         function login() {
            alert("로그인 후 이용해 주시기 바랍니다");
            location.href="login.php";
        }
    </script>
</body>
</html>