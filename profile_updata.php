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
		.updata_ok{
			margin-top: 10px;
		}
		.submit {
			padding: 5px;
			text-align: center;
			margin: 20px auto;
			display: grid;
			place-content:center;
		}
		.sub {
			position: absolute;
			left: 40%;
		}
		.can {
			position: absolute;
			left: 50%;
		}
	</style>
</head>
<body>
	<div class="updata">
		<div class="updata_warp">
			<form action="profile_updata_ok.php?email=<?php echo $user['email']; ?>" method="post">
			<div class="updata_now">
			<p class="now_p">기존 이메일 정보</p>
			<p class="now_email"><?php echo $user['email'] ?></p>
		</div>
		<div class="updata_ok">
			<p class="ok_p">변경하고 싶은 이메일</p>
			<p class="ok_email"><input type="email" name="email" placeholder="예) ICTBOOK@deu.co.kr" onfocus="this.placeholder=''" onblur="this.placeholder='예) ICTBOOK@deu.co.kr'"></p>
		</div>
		<input type="submit" name="" class="submit sub" value="확인">
		</form>
		<button class="submit can" onclick="window.close();">취소</button>
		</div>
	</div>
</body>
</html>