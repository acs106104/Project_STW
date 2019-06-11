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
			<h2><b>個人資料</b>
				<i class="fas fa-level-down-alt"></i>
			</h2>
			<div class="form-style-agile">
			<center><font color="red">
				<?php
					$link = @mysqli_connect("localhost","root","") 
					or die("無法開啟MySQL資料庫連接!<br/>");
					mysqli_select_db($link, "userdata");


					if(!isset($_SESSION)) 
					{ 
					session_start(); 
					} 

					$member = $_SESSION['account'];	
					$check_laccount = "SELECT * FROM userdata WHERE 帳號 = '$member' ";

					mysqli_query($link, 'SET NAMES utf8'); 
					$result_laccount = mysqli_query($link, $check_laccount);
					if(!$result_laccount)
					{
					echo ("Error: ".mysqli_error($link));
					exit();
					}

					$rows=mysqli_fetch_array($result_laccount); 
				
				if(isset($_POST["returnHome"])){
					header("Location: ./buyer.php"); 
				}
				?>		
			</font>
			</center>
			<b>姓名: </b> <?php  echo $rows["姓名"];?> <br/>
			<b>暱稱: </b> <?php  echo $rows["暱稱"];?> <br/>
			<b>手機號碼: </b> <?php  echo $rows["手機號碼"];?> <br/>
			<b>電子郵箱: </b> <?php  echo $rows["電子信箱"];?> <br/>
			<b>地址: </b> <?php  echo $rows["地址"];?> <br/>
			<b>帳號: </b> <?php  echo $rows["帳號"];?> <br/>
			<b>密碼: </b> <?php  echo $rows["密碼"];?> <br/>
			</div>
			<input type="submit" name="returnHome" value="返回會員專區">
		</form>
	</div>

	<div class="footer">
		<p>= 二手交易網站 Second-hand shop =</p>
	</div>

</body>

</html>

	
   
		
	




