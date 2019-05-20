<!DOCTYPE HTML>
<html>

<head>
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content=""/>
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />

	<script>
			addEventListener("load", function () {
				setTimeout(hideURLbar, 0);
			}, false);
	
			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
</head>

<body>

	<!-- 登入 -->
	<div class="sub-main-w3">
		<form action="#" method="post">
			<h2><b>註冊Register</b>
				<i class="fas fa-level-down-alt"></i>
			</h2>
			<!--姓名-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-user"></i>
					姓名
				</label>
				<input placeholder="姓名" name="name" type="text" required="">
			</div>
			<!--暱稱-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					暱稱
				</label>
				<input placeholder="暱稱" name="nick" type="text" required="">
			</div>
			<!--手機號碼-->
						<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					手機號碼
				</label>
				<input placeholder="手機號碼" name="phone" type="text" required="">
			</div>
			<!--電子郵箱-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					電子郵箱
				</label>
				<input placeholder="電子郵箱" name="mail" type="text" required="">
			</div>
			<!--地址-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					地址
				</label>
				<input placeholder="地址" name="address" type="text" required="">
			</div>
			<!--帳號-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					帳號
				</label>
				<input placeholder="帳號" name="account" type="text" required="">
			</div>
			<!--密碼-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					密碼
				</label>
				<input placeholder="密碼" name="pwd" type="password" required="">
			</div>
			<!--確認密碼-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					確認密碼
				</label>
				<input placeholder="確認密碼" name="pwd1" type="password" required="">
			</div>

			<input type="submit" name="register" value="註冊">
		</form>
	</div>
	<?php
		if(isset($_POST["register"])){
			$link = @mysqli_connect("localhost","root","1234") 
					or die("無法開啟MySQL資料庫連接!<br/>");
			mysqli_select_db($link, "userdata");
			
			if($_POST['name']=="" || $_POST['nick'] == "" || $_POST['phone'] == "" || $_POST['mail'] == "" || $_POST['address'] == "" || $_POST['account'] == "" || $_POST['pwd'] == "" || $_POST['pwd1'] == ""){
				echo "全部資料皆要填寫，不可空白";
			}
			else{
			$user_name = $_POST['name'];
			$user_nick = $_POST['nick'];
			$user_phone = $_POST['phone'];
			$user_mail = $_POST['mail'];
			$user_address = $_POST['address'];
			$user_account = $_POST['account'];
			$user_pwd = $_POST['pwd'];
			$user_pwd1 = $_POST['pwd1'];
			
			if($user_pwd == $user_pwd1){
			
			$sql = "INSERT INTO `userdata` (`姓名`, `暱稱`, `手機號碼`, `電子信箱`, `地址`, `帳號`, `密碼`) 
			VALUES ('$user_name', '$user_nick', '$user_phone', '$user_mail', '$user_address', '$user_account', '$user_pwd');";
			
			
			
			mysqli_query($link, "SET NAMES utf8"); 
			mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
			if ( mysqli_query($link, $sql) ){ // 執行SQL指令
				header("Refresh: 3; url=../Login/Login.php"); 
				
			}
			else
				die("資料庫新增記錄失敗<br/>");
			}
			else
				echo "密碼不相符";
		
			mysqli_close($link);
			}
		}
   ?>

	<div class="footer">
		<p>= 二手交易網站 Second-hand shop =</p>
	</div>

</body>

</html>