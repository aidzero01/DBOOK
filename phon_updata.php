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
			width: 70px;
			padding: 3px 0;
		}
	</style>
</head>
<body>
	<form action="op_phon.php?email=<?php echo $user['email']; ?>" method="post">
		<div class="updata">
			<div class="updata_warp">
				<fieldset>
					<legend>전화 번호 변경</legend>
				<div class="updata_now">
				<p class="now_p">기존 전화 번호</p>
				<p class="now_email"><?php echo $user['phonone'] ?>-<?php echo $user['phontwo'] ?>-<?php echo $user['phonthree'] ?></p>
			</div>
			<div class="updata_ok">
				<p class="ok_p">변경하고 싶은 전화번호</p>
				<p class="ok_email"><input type="number" name="one" oninput="handleInputLength(this, 3)" /> - <input type="number" minlength = "4" name="two" oninput="handleInputLength(this, 4)"> - <input type="number" minlength = "4"  name="three" maxlength="4" oninput="handleInputLength(this, 4)"/></p>
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
<script type="text/javascript">
	function handleInputLength(el, max) {
  if(el.value.length > max) {
    el.value = el.value.substr(0, max);
  }
}
	</script>
</html>