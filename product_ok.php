<?php 
include "db.php";

/*********************************************
* 넘어오는 데이터가 정상인지 검사하기 위한 절차
* 실제 페이지에서는 적용 X
**********************************************/

//$_FILES에 담긴 배열 정보 구하기.
/*var_dump($_FILES);*/

// php 내부 소스에서 html 태그 적용 - 선긋기
/*echo "<hr>";*/

/*********************************************
* 실제로 구축되는 페이지 내부.
**********************************************/

// 임시로 저장된 정보(tmp_name)
$tempFile = $_FILES['imgFile']['tmp_name'];

// 파일타입 및 확장자 체크
$fileTypeExt = explode("/", $_FILES['imgFile']['type']);

// 파일 타입 
$fileType = $fileTypeExt[0];

// 파일 확장자
$fileExt = $fileTypeExt[1];

// 파일 사이즈
$size = $_FILES["imgFile"]["size"];

// 확장자 검사
$extStatus = false;
$p_title = $_POST['p_title'];
$p_price = $_POST['p_price'];
$p_content = $_POST['p_content'];
$p_fan = $_POST['p_fan'];
$p_grade = $_POST['p_grade'];
$p_major = $_POST['p_major'];
$p_bu_major = $_POST['bu_major'];
$p_condition = $_POST['p_condition'];
$p_email = $_POST['p_email'];
$p_data = date('Y-m-d H:i:s');
$p_sell = $_POST['p_sell'];
$p_sell = $_POST['p_sell'];
$p_name	= $_POST['name'];
$p_nick	= $_POST['nick'];
$p_unique_id = $_POST['unique_id'];


if($p_title == ""){
	echo "<script>alert('책 제목을 입력해주세요');history.go(-1);</script>";
}else if($p_price == ""){
	echo "<script>alert('책 가격을 입력해주세요');history.go(-1);</script>";
}else if($p_content == ""){
	echo "<script>alert('책에 대한 내용을 입력해주세요');history.go(-1);</script>";
}else if($p_fan == ""){
	echo "<script>alert('책 출판사를 입력해주세요');history.go(-1);</script>";
}else {


switch($fileExt){
	case 'jpeg':
	case 'jpg':
	case 'gif':
	case 'bmp':
	case 'png':
		$extStatus = true;
		break;
	
	default:
		echo "이미지 전용 확장자(jpg, bmp, gif, png)외에는 사용이 불가합니다."; 
		exit;
		break;
}
	// 이미지 파일이 맞는지 검사. 
	if($fileType == 'image'){
		// 허용할 확장자를 jpg, bmp, gif, png로 정함, 그 외에는 업로드 불가
		if($extStatus){
			// 임시 파일 옮길 디렉토리 및 파일명
			$resFile = "./uploads/{$_FILES['imgFile']['name']}";
			// 임시 저장된 파일을 우리가 저장할 디렉토리 및 파일명으로 옮김
			$imageUpload = move_uploaded_file($tempFile, $resFile);
			
			// 업로드 성공 여부 확인
			if($imageUpload == true){

			$filename = $_FILES["imgFile"]["name"];
			$imgurl = "http://localhost//dbook//uploads/". $_FILES["imgFile"]["name"];
				/*echo "<img src='{$resFile}' width='100' />";*/
				$sql = "INSERT INTO product(filename, imgurl, size, p_title, p_price, p_content, p_fan, p_grade, p_major, p_bu_major, p_condition, p_email, date, p_sell, p_name, p_nick, p_unique_id) 
						VALUES('$filename','$imgurl','$size','$p_title','$p_price','$p_content','$p_fan','$p_grade','$p_major','$p_bu_major','$p_condition','$p_email','$p_data','$p_sell','$p_name','$p_nick','$p_unique_id')";
				echo "<script>alert('파일이 정상적으로 업로드 되었습니다');location.href='index.php';</script>. <br>";
			    mysqli_query($db,$sql);
			}else{
				echo "파일 업로드에 실패하였습니다.";
			}
		}	// end if - extStatus
			// 확장자가 jpg, bmp, gif, png가 아닌 경우 else문 실행
		else {
			echo "파일 확장자는 jpg, bmp, gif, png 이어야 합니다.";
			exit;
		}	
	}	// end if - filetype
		// 파일 타입이 image가 아닌 경우 
	else {
		echo "이미지 파일이 아닙니다.";
		exit;
	}
}
?>