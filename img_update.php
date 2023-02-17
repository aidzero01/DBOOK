<!-- <body>
    <div class="field image">
        <label>Select Image</label>
        <input type="file" name="image">
        <div>
            <img id="img" width="250px" height="300px" alt="미리 보기">
        </div>
    </div>
</body> -->

<!-- <?php include "img_script.php"; ?>
<html>
	<head>
	<title>프로필사진 변경</title>
		<body>
		    <div id="inputDiv" align="center">
	            <input type="file" name="m_photo" id="m_photo" >
                <input type="submit" name="" class="submit sub" value="변경">
			    <button class="submit can" onclick="window.close();">취소</button>
	        </div>
            <div id="imgDiv" align="center">
		        <img id="m_preview" style="display:none;">
	        </div>

		</body>
	</head>
</html> -->

<?php 
    include "db.php";
    $p_user = $_GET['email'];
    $sql = mq("select * from users where email = '$p_user';");
    $user = $sql->fetch_array();
    include "img_script.php"; 
?>
<html>
<body>
	<form action="op_img.php?email=<?php echo $user['email']; ?>" enctype="multipart/form-data" method="post">
	<div class="updata">
		<div class="updata_warp">
			<fieldset>
			<legend>프로필사진 변경</legend>
			<div id="inputDiv" align="center">
	            <input type="file" name="image" id="m_photo">
	        </div>
            <div id="imgDiv" align="center">
		        <img id="m_preview" style="display:none;">
	        </div>
		<ul align="right">
			<input type="submit" name="" class="submit sub" value="변경">
		
			<button class="submit can" onclick="window.close();">취소</button>
		</ul>
		</fieldset>
		</div>
	</div>
	</form>
</body>
</html>