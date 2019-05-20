<!DOCTYPE HTML>
<html>

<head>
	<title>Login</title>
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
			<h2><b>登入Login</b>
				<i class="fas fa-level-down-alt"></i>
			</h2>
			<div class="form-style-agile">
				<label>
					<i class="fas fa-user"></i>
					帳號
				</label>
				<input placeholder="帳號" name="laccount" type="text" required="">
			</div>
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					密碼
				</label>
				<input placeholder="密碼" name="password" type="password" required="">
			</div>
			<!---->
			<div class="wthree-text">
				<label class="anim">
					<input type="checkbox" class="checkbox" required="">
					記住帳號
				</label>
				<br/>
				<a href="">忘記密碼</a>
			</div>
			<!---->
			<input type="submit" name="login" value="登入">
		</form>
	</div>

	<?php
	if(isset($_POST["login"])){
	   $link = @mysqli_connect("localhost","root","1234") 
			 or die("無法開啟MySQL資料庫連接!<br/>");
	   mysqli_select_db($link, "userdata");
	   
	   if($_POST['laccount']=="" || $_POST['password'] == ""){
		  echo "帳號或密碼不可空白";
	   }
	   else{
	   $user_laccount = $_POST['laccount'];
	   $user_password = $_POST['password'];
	   
	   $check_laccount = "SELECT * FROM userdata WHERE 帳號 = '$user_laccount'";
	   
	   
	   mysqli_query($link, 'SET NAMES utf8'); 
	   $result_laccount = mysqli_query($link, $check_laccount);
	   
	   if(!$result_laccount)
	   {
		  echo ("Error: ".mysqli_error($link));
		  exit();
	   }
	   
	   $rows=mysqli_fetch_array($result_laccount);
	   
	   
	   if($user_laccount == $rows["帳號"]){
		  if($user_password == $rows["密碼"]){
			 echo "登入成功";
		  }
		  else{
			 echo "密碼錯誤";
		  }
	   }
	   else{
		  echo "帳號錯誤";
	   }
	   }
	}
	?>

	<div class="footer">
		<p>= 二手交易網站 Second-hand shop =</p>
	</div>

</body>

</html>