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
    <link rel="stylesheet" type="text/css" href="css/content.css">
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
                            <h2 class="clorl">게시판</h2>
                            <p>home . board user</p>
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
            <table style="width:100%;" class="about_btm">
                <thead style="font-weight: bolder;">
                    <tr>
                        <td>번호</td>
                        <td>제목</td>
                        <td>작성자</td>
                        <td>작성일</td>
                        <td>조회수</td>
                        <td>추천수</td>
                    </tr>
                </thead>
                <?php
                if(isset($_GET['page'])){
                $page = $_GET['page'];
                }else{
                $page = 1;
                }
                $sql = mq("select * from board");
                $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
                $list = 10; //한 페이지에 보여줄 개수
                $block_ct = 5; //블록당 보여줄 페이지 개수

                $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
                $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
                $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

                $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
                if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
                $total_block = ceil($total_page/$block_ct); //블럭 총 개수
                $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

                $sql2 = mq("select * from board order by num desc limit $start_num, $list");  
                while($board = $sql2->fetch_array()){
                $title=$board["title"]; 
                if(strlen($title)>30)
                { 
                  $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                }
                $con_idx = $board["num"];
                $reply_count = mq("SELECT COUNT(*) as cnt FROM replay where cn_num=$con_idx");
                $rep_count = $reply_count->fetch_array();
                ?>
                <tbody>
                    <tr>
                        <?php
                        if($board['lock_write'] == '1'){
                             if(!isset($_SESSION['email'])){
                                if($board['lock_write'] != '1' || $board['name'] == "admin@deu.co.kr"){
                                    ?>
                                <td><?php echo $board['num'] ?></a></td>
                                <td><a href="read.php?num=<?php echo$board["num"];?>"><?php echo $title;?>[<?php echo$rep_count['cnt']?>]</td>
                                <td><?php echo $board['name'] ?></td>
                                <td><?php echo $board['data'] ?></td>
                                <td><?php echo $board['view'] ?></td>
                                <td><?php echo $board['hit'] ?></td>
                                    <?php
                                }else{
                              ?>
                                 <td><?php echo $board['num'] ?></td>
                                <td>비밀글 입니다</td>
                                <td><?php echo $board['name'] ?></td>
                                <td><?php echo $board['data'] ?></td>
                              <?php
                                }
                             }
                            else if($board['name'] == $_SESSION['email'] || $_SESSION['email'] == "admin@deu.co.kr"){
                        ?>
                                 <td><?php echo $board['num'] ?></a></td>
                                <td><a href="read.php?num=<?php echo $board["num"];?>"><?php echo $title ?></td>
                                <td><?php echo $board['name'] ?></td>
                                <td><?php echo $board['data'] ?></td>
                                <td><?php echo $board['view'] ?></td>
                                <td><?php echo $board['hit'] ?></td>
                        <?php
                            }else {
                                ?>
                                <td><?php echo $board['num'] ?></td>
                                <td>비밀글 입니다</td>
                                <td><?php echo $board['name'] ?></td>
                                <td><?php echo $board['data'] ?></td>
                                <?php
                            }
                        ?>
                        <?php    
                        }else {
                        ?>
                       <td><?php echo $board['num'] ?></a></td>
                        <td><a href="read.php?num=<?php echo $board["num"];?>"><?php echo $title ?>[<?php echo$rep_count['cnt']?> ]</td>
                        <td><?php echo $board['name'] ?></td>
                        <td><?php echo $board['data'] ?></td>
                        <td><?php echo $board['view'] ?></td>
                        <td><?php echo $board['hit'] ?></td>
                        <?php
                            }
                        ?>
                    </tr>
                </tbody>
           <?php } ?>
            </table>
                <?php
               if(isset($_SESSION['email'])){
                    echo "               
                    <div id='write_btn' class='page_btm_1'>
                         <a href='write.php'><button>글쓰기</button></a>
                     </div>";
                }
                ?>
                <div class="page_num page_btm_2">
                    <ul>
                    <?php
                        if($page<=1){
                            echo"<li>처음</li>";
                        }else{
                            echo"<li><a href='?page=1'>처음</a></li>";
                        }
                        if($page <= 1) {

                        }else{
                            $pre = $page-1;
                            echo"<li><a href='?page=$pre'>이전</a></li>";
                        }for($i=$block_start;$i<=$block_end;$i++){
                            if($page == $i){
                                echo"<li>[$i]</li>";
                            }else{
                                echo"<li><a href='?page=$i'>[$i]</a></li>";
                            }
                        }
                        if($block_num >= $total_block){

                        }else{
                            $next = $page + 1;
                            echo"<li><a href='?page=$next'>다음</a></li>";
                        }
                        if($page >= $total_page){
                            echo"<li>마지막</li>";
                        }else{
                            echo"<li><a href='?page=$total_page'>다음</a></li>";
                        }
                    ?>
                    </ul>
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