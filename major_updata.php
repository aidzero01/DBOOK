<?php
	include "db.php";

    $p_user = $_GET['email'];
    $sql = mq("select * from sign_check where email = '$p_user';");
    $user = $sql->fetch_array();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
		}
		.updata {
			position: relative;
		}
		.updata_warp {
			
			margin: 10px;

		}
		fieldset {
			padding: 30px 10px;
		}
		.updata_ok{
			margin-top: 10px;
		}
		.submit {
			border:1px solid #FFFFFF;
			padding: 10px;
	
		}
		ul li{
			text-decoration: none;
			list-style: none;
			display: inline-block;
		}
		ul {
			text-align: right;
		}
		.now_p {
			font-weight: bolder;
			font-size: 16px;
		}
		.now_email {
			color:gray;
		}
		.ok_p {
			font-weight: bolder;
			font-size: 16px;
			margin-top: 20px;
		}
		.ok_email input {
			border: 1px solid gray;
			margin-top: 7px;
			width: 70px;
			padding: 3px 0;
		}
	</style>
</head>
<body>
	<form action="op_major.php?email=<?php echo $user['email']; ?>" method="post">
		<div class="updata">
			<div class="updata_warp">
				<fieldset>
					<legend>학과 변경</legend>
				<div class="updata_now">
				<p class="now_p">기존 학과 및 학부</p>
				<p class="now_email"><?php echo $user['major'] ?>-<?php echo $user['bu_major'] ?></p>
			</div>
			<div class="updata_ok">
				<p class="ok_p">변경하고 싶은 학과 및 학부</p>
				<p class="ok_email">
						<div class="form-group row">
                            <label class="col-sm-2">학 과</label>
                             <div class="com-sm-3" >
                                <select name="p_major" id="p_major" style="margin-bottom: 10px;">
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
                            <div class="com-sm-3">
                       			<label class="col-sm-2">학 부</label>
                            <div class="com-sm-3">    
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
                                        <option value="물리치료학과">보육 가정상담학과</option>
                                        <option value="물리치료학과">식품영양학과</option>
                                    </optgroup>
                                </select>
                            </div>
                                <input type="hidden" name="bu_major" id="aaa" value="">
                            </div>
                        </div>

				</p>
			</div>
			<ul>
					<li><input type="submit" name="" class="submit sub" value="확인"></li>
				  <li><button class="submit can" onclick="window.close();">취소</button></li>
			</ul>
			</fieldset>
			</div>
		</div>
	</form>
</body>
 <script src="js/jquery-1.12.1.min.js"></script>
<script type="text/javascript">
$("select[name=p_bu_major]").change(function(){
    console.log($(this).val());
    $("#aaa").val($(this).val());
});
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
</html>