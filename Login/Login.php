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

	<style>
	.tabs{position:relative;width:350px; height:520px;  }    
	.tab{ float:left;  }    
	.tab > input[type=radio]{display:none;}    
	.tab > label{display:block; position:relative; min-width:40px; height:20px;  margin-right:-1px; padding:5px 15px;  background:#DDD;      border:1px solid #AAA;  }    
	.tab > .content{      display:none;      position:absolute;      top:30px;      right:0;      bottom:0;      left:0;      z-index:1;      padding:10px;      background:#FFF;      border:1px solid #AAA;  }    
	.tab > input[type=radio]:checked + label{      background:#FFF;      border-bottom:1px solid transparent;      z-index:2;  }    .tab > input[type=radio]:checked ~ .content{      display:block;      }
	</style>
</head>

<body>

	<!-- 登入 -->
	<div class="sub-main-w3">
		<form action="#" method="post">
			<h2><b>登入Login</b>
				<i class="fas fa-level-down-alt"></i>
			</h2>
			<div class="form-style-agile">
			<center><font color="red">
			<?php
	if(isset($_POST["login"])){
	   $link = @mysqli_connect("localhost","root","") 
			 or die("無法開啟MySQL資料庫連接!<br/>");
	   mysqli_select_db($link, "userdata");
	   
	   if($_POST['laccount']=="" || $_POST['password'] == ""){
		  echo "帳號或密碼不可空白";
	   }
	   else if($_POST['code1'] != $_POST['cc']){
			echo "驗證碼錯誤";
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
			 session_start();
			 $_SESSION['account']=$user_laccount;
			 header("Location: ../home/home.php"); 
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

	if(isset($_POST["returnHome"])){
		header("Location: ../home/home.php"); 
	}
	?>		
			</font>
			</center>
			</div>
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
			<div class="form-style-agile">
			<center>
				<table border= "1">
				<?php
				$rand1 = rand(10000,99999);
				$temp=$rand1;
				print "<tr>";
				print "<td><b><font color='red' size='5'> " . $rand1 . " </font></b></td>";
				?>
				<input type="hidden" name="cc" value="<?php echo $rand1; ?>">
				</table>
			</center>
				<label>
					<i class="fas fa-user"></i>
					驗證碼
				</label>
				<input placeholder="驗證碼" name="code1" type="text" maxlength="5" required="">
			</div>
			<!---->
			<div class="wthree-text">
				<label class="anim">
					<input type="checkbox" class="checkbox" required="">
					我不是機器人
				</label>
				<br/>
				<a href="">忘記密碼</a>
				&nbsp;
				<a href="../Register/Register.php">註冊帳號</a>
			</div>
			<!---->
			<input type="submit" name="login" value="登入">
			<input type="submit" name="returnHome" value="返回HOME">
		</form>
	</div>

	<div class="footer">
		<p>= 二手交易網站 Second-hand shop =</p>
	</div>

</body>

</html>