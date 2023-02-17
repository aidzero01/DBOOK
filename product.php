<!doctype html>
<html lang="en">
<?php
    include "db.php";
    include "img_script.php"; 
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
    <link rel="stylesheet" type="text/css" href="css/content.css">
    <style type="text/css">
        .product-title {
            border: 1px solid #ebebeb;
            padding : 30px 0 30px 15px; 
        }
        .product-title label {
            font-size: 16px;
            font-weight: bolder;
        }
        .footer-area {
            margin-top:30px ;
            padding: 0;
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
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2 class="clorl">상품 등록</h2>
                            <p>home . board user</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- banner part start-->

    <!-- booking part start-->
    <section class="booking_part" style="margin-top:0px">
    <div class="container" >
    <?php
        $user_id = $_SESSION['email'];
        $sql = "SELECT * FROM sign_check WHERE email='$user_id'";
	    $result = mysqli_fetch_array(mysqli_query($db, $sql));
    ?>      
    <form  action="product_ok.php" method="post" enctype="multipart/form-data">
    <section class="page-section bg-light product-center" id="portfolio" style="height: 800px; background-color:white!important;" >
            <div class="container product">
                <div class="text-center">
                    <div class="product-title">

                        <div class="form-group row">
                            <label class="col-sm-2">상품 이름</label>
                            <div class="com-sm-3">
                                <input type="hidden" name="nick" value="<?=$result['nick']?>">
                                <input type="hidden" name="name" value="<?=$result['name']?>">
                                <input type="hidden" name="unique_id" value="<?=$result['unique_id']?>">
                                <input type="hidden" name="p_email" value="<?=$_SESSION['email']?>">
                                <input type="text" id="productId" name="p_title" class="form-control" placeholder="정확한이름 적어주십시요">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">가격</label>
                            <div class="com-sm-3">
                                <input type="text" id="unitPrice" name="p_price" class="form-control" placeholder="ex)10000원">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">판매자 한마디</label>
                            <div class="com-sm-5">
                                <textarea name="p_content" cols="50" rows="2" class="form-control" placeholder="사용한 기간이나 책의 필기 정도 책의 상세 상태 등을 적어주세요."></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">출판사</label>
                            <div class="com-sm-3">
                                <input type="text" name="p_fan" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">사용 학년</label>
                            <div class="com-sm-3">
                                <select  name="p_grade">
                                    <optgroup label="학 년">
                                        <option value="1">1 학년</option>
                                        <option value="2">2 학년</option>
                                        <option value="3">3 학년</option>
                                        <option value="4">4 학년</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                          <div class="form-group row">
                            <label class="col-sm-2">사용 학과</label>
                            <div class="com-sm-3">
                                <select name="p_major" id="p_major">
                                    <optgroup label="학 과" >
                                        <option value="NULL">-------학 과 선 택------</option>
                                        <option value="ICT공과 대학">ICT공과 대학</option>
                                        <option value="공과 대학">공과 대학</option>
                                        <option value="예술디자인체육 대학">예술디자인체육 대학</option>
                                        <option value="IT융합부품소재공과 대학">IT융합부품소재공과 대학</option>
                                        <option value="의료·보건·생활 대학">의료·보건·생활 대학</option>
                                        <option value="한의과 대학">한의과 대학</option>
                                        <option value="상경 대학">상경 대학</option>
                                        <option value="인문사회과학 대학">인문사회과학 대학</option>
                                    </optgroup>
                                </select>

                                <select name="p_bu_major" value="ICT공과 대학"  id="ICT"  style="display:none" >
                                    <optgroup label="학 부">
                                        <option value="컴퓨터공학과">컴퓨터공학과</option>
                                        <option value="창의소프트웨어공학부">창의소프트웨어공학부</option>
                                        <option value="전기전자통신공학부">전기전자통신공학부</option>
                                        <option value="디지털콘텐츠학과">디지털콘텐츠학과</option>
                                        <option value="게임공학과">게임공학과</option>
                                        <option value="영화학과">영화학과</option>
                                        <option value="인공지능학과">인공지능학과</option>
                                        <option value="소프트웨어융합학과">소프트웨어융합학과</option>
                                    </optgroup>
                                </select>

                                <select name="p_bu_major" value="상경 대학"  id="COM"  style="display:none" >
                                    <optgroup label="학 부">
                                        <option value="경제금융보험학과">경제금융보험학과</option>
                                        <option value="재무부동산학과">재무부동산학과</option>
                                        <option value="부동산금융 자산경영학과">부동산금융 자산경영학과</option>
                                        <option value="무역학과">무역학과</option>
                                        <option value="유통물류학과">유통물류학과</option>
                                        <option value="경영학과">경영학과</option>
                                        <option value="회계학과">회계학과</option>
                                        <option value="정보경영학과">정보경영학과</option>
                                        <option value="국제관광경영학과">국제관광경영학과</option>
                                        <option value="컨벤션경영학과">호텔 컨벤션경영학과</option>
                                        <option value="외식경영학과">외식경영학과</option>
                                        <option value="스마트호스트피탈리티학과">스마트호스트피탈리티학과</option>
                                    </optgroup>
                                </select>

                                <select name="p_bu_major" value="인문사회과학 대학"  id="Human"  style="display:none" >
                                    <optgroup label="학 부">
                                        <option value="국어국문학과">국어국문학과</option>
                                        <option value="중국어중국학과">중국어중국학과</option>
                                        <option value="일본어학과">일본어학과</option>
                                        <option value="영어영문학과">영어영문학과</option>
                                        <option value="문헌정보학과">문헌정보학과</option>
                                        <option value="평생교육 청소년상담학과">평생교육 청소년상담학과</option>
                                        <option value="사회복지학과">사회복지학과</option>
                                        <option value="광고홍보학과">광고홍보학과</option>
                                        <option value="미디어커뮤니케이션학과">미디어커뮤니케이션학과</option>
                                        <option value="법학과">법학과</option>
                                        <option value="경찰행정학과">경찰행정학과</option>
                                        <option value="소방방재행정학과">소방방재행정학과</option>
                                        <option value="행정학과">행정학과</option>
                                    </optgroup>
                                </select>

                                <select name="p_bu_major" value="한의과 대학"  id="medicine"  style="display:none" >
                                    <optgroup label="학 부">
                                        <option value="한의예과">한의예과</option>
                                    </optgroup>
                                </select>

                                <select name="p_bu_major" value="IT융합부품소재공과 대학"  id="Convergence"  style="display:none" >
                                    <optgroup label="학 부">
                                        <option value="신소재공학부">신소재공학부</option>
                                        <option value="기계자동차로봇부품공학부">기계자동차로봇부품공학부</option>
                                        <option value="디자인공학부">디자인공학부</option>
                                        <option value="산업융합시스템공학부">산업융합시스템공학부</option>
                                        <option value="미래형자동차학과">미래형자동차학과</option>
                                    </optgroup>
                                </select>

                                <select name="p_bu_major" value="공과 대학"  id="Engineering"  style="display:none" >
                                    <optgroup label="학 부">
                                        <option value="건설공학부">건설공학부</option>
                                        <option value="화학환경공학부">화학환경공학부</option>
                                        <option value="바이오응용공학부">바이오응용공학부</option>
                                        <option value="조선해양공학과">조선해양공학과</option>
                                    </optgroup>
                                </select>

                                 <select name="p_bu_major" value="예술디자인체육 대학"  id="Sport"  style="display:none" >
                                    <optgroup label="학 부">
                                        <option value="음악학과">음악학과</option>
                                        <option value="체육학과">체육학과</option>
                                        <option value="디자인조형학과">디자인조형학과</option>
                                        <option value="레저스포츠학과">레저스포츠학과</option>
                                        <option value="패션디자인학과">패션디자인학과</option>
                                        <option value="태권도학과">태권도학과</option>
                                    </optgroup>
                                </select>

                                <select name="p_bu_major" value="의료·보건·생활 대학"  id="Nursing"  style="display:none" >
                                    <optgroup label="학 부">
                                        <option value="간호학과">간호학과</option>
                                        <option value="임상병리학과">임상병리학과</option>
                                        <option value="치위생학과">치위생학과</option>
                                        <option value="방사선학과">방사선학과</option>
                                        <option value="의료경영학과">의료경영학과</option>
                                        <option value="물리치료학과">물리치료학과</option>
                                        <option value="보육 가정상담학과">보육 가정상담학과</option>
                                        <option value="식품영양학과">식품영양학과</option>
                                    </optgroup>
                                </select>

                                <div>
                                <input type="hidden" name="bu_major" id="aaa" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2">상태</label>
                            <div class="com-sm-5">
                                <input type="radio" name="p_condition" value="새교재"> 새교재
                                <input type="radio" name="p_condition" value="중고교재"> 중고교재
                            </div>
                            <div style="display:none;">
                                <input type="hidden" name="p_sell" value="0" checked> 0
                                <input type="hidden" name="p_sell" value="1"> 1
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2">상품이미지</label>
                            <div>
                                <input id="imgFile" type="file" name="imgFile" id="fileToUpload" style="float:left;">
                                <img id="img" src="#" width="250px" height="300px" alt="이미지 미리보기">
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-primary" value="등록">
                            </div>
                        </div>
                </div>
                </div>
            </div>
    </section>
    </form>
        </div>
    </section>
    <!-- Header part end-->
    <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="img/logo.png" alt="..." aria-label="Microsoft Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="img/deu_logo.png" alt="..." aria-label="Google Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="img/dap_logo.png" alt="..." aria-label="Facebook Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="img/door_logo.png" alt="..." aria-label="IBM Logo" /></a>
                </div>
            </div>
        </div>
    </div>

    <!--::industries end::-->
    <!-- footer part start-->
    <footer class="footer-area">
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

        $("select[name=p_bu_major]").change(function(){
            console.log($(this).val());
            $("#aaa").val($(this).val());
        });

        $(function() {
            $("#imgFile").on('change', function(){
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                    $('#img').attr('src', e.target.result);
                }

              reader.readAsDataURL(input.files[0]);
            }
        }

        $('#p_major').change(function(){
             var major =  $(this).val();
             if(major == "상경 대학"){
                $('#COM').show();
             }else{
                $('#COM').hide();
             }

             if(major == "ICT공과 대학"){
                $('#ICT').show();
             }else{
                $('#ICT').hide();
             }

             if(major == "인문사회과학 대학"){
                $('#Human').show();
             }else{
                $('#Human').hide();
             }

             if(major == "한의과 대학"){
                $('#medicine').show();
             }else{
                $('#medicine').hide();
             }

             if(major == "IT융합부품소재공과 대학"){
                $('#Convergence').show();
             }else{
                $('#Convergence').hide();
             }

              if(major == "공과 대학"){
                $('#Engineering').show();
             }else{
                $('#Engineering').hide();
             }

              if(major == "예술디자인체육 대학"){
                $('#Sport').show();
             }else{
                $('#Sport').hide();
             }

              if(major == "의료·보건·생활 대학"){
                $('#Nursing').show();
             }else{
                $('#Nursing').hide();
             }
        });
    </script>

</body>

</html>