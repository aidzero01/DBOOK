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
		}
		.ok_email input {
			border: 1px solid gray;
			margin-top: 7px;
			padding: 5px;
		}
	</style>
</head>
<body>
	<form action="op_name.php?email=<?php echo $user['email']; ?>" method="post">
	<div class="updata">
		<div class="updata_warp">
			<fieldset>
			<legend>이름 변경</legend>
			<div class="updata_now">
			<p class="now_p">기존 이름 정보 : </p>
			<p class="now_email"><?php echo $user['name'] ?></p>
		</div>
		<div class="updata_ok">
			<p class="ok_p">변경하고 싶은 이름 : </p>
			<p class="ok_email"><input type="text" name="name" placeholder="예) 조정우" onfocus="this.placeholder=''" onblur="this.placeholder='예) 조정우'"></p>
		</div>
		<ul>
			<li><input type="submit" name="" class="submit sub" value="변경"></li>
		
			<li><button class="submit can" onclick="window.close();">취소</button></li>
		</ul>
		</fieldset>
		</div>
	</div>
	</form>
</body>
<script type="text/javascript">
	</script>
</html>