<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>catalog</title>
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
<title>Search</title>
</head>
<body>
<?php


	$link = @mysqli_connect("localhost","root","") 
					or die("無法開啟MySQL資料庫連接!<br/>");
	mysqli_select_db($link, "userdata");
	session_start();	
	$now=$_SESSION['account'];
	$check_laccount = "SELECT * FROM userdata WHERE 帳號 = '$now'";
	  
	mysqli_query($link, 'SET NAMES utf8'); 
	$result_laccount = mysqli_query($link, $check_laccount);
	if(!$result_laccount)
	{
		echo ("Error: ".mysqli_error($link));
		exit();
	}
	   
	$rs=mysqli_fetch_row($result_laccount); // 取回記錄 
	
	
	
?>
   <link rel="stylesheet" href="style.css" type="text/css" media="all" />
	
   <!-- 登入 -->
	<div class="sub-main-w3">
		<form action="change.php" method="post">
			<h2><b>個人資料</b>
				<i class="fas fa-level-down-alt"></i>
			</h2>
			<!--姓名-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-user"></i>
					姓名
				</label>
				<input placeholder= "姓名" name="name" type="text" required="" value="<?php echo $rs[1] ?>">
			</div>
			<!--暱稱-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					暱稱
				</label>
				<input placeholder="暱稱" name="nick" type="text" required="" value="<?php echo $rs[2] ?>">
			</div>
			<!--手機號碼-->
						<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					手機號碼
				</label>
				<input placeholder="手機號碼" name="phone" type="text" required="" value="<?php echo $rs[3] ?>">
			</div>
			<!--電子郵箱-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					電子郵箱
				</label>
				<input placeholder="電子郵箱" name="mail" type="text" required="" value="<?php echo $rs[4] ?>">
			</div>
			<!--地址-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					地址
				</label>
				<input placeholder="地址" name="address" type="text" required="" value="<?php echo $rs[5] ?>">
			</div>
			<!--帳號-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					帳號
				</label>
				<input placeholder="帳號" readonly="readonly" name="account" type="text" required="" value="<?php echo $rs[6] ?>">
			</div>
			<!--密碼-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					密碼
				</label>
				<input placeholder="密碼" name="pwd" type="password" required="" value="<?php echo $rs[7] ?>">
			</div>
			<!--確認密碼-->
			<div class="form-style-agile">
				<label>
					<i class="fas fa-unlock-alt"></i>
					確認密碼
				</label>
				<input placeholder="確認密碼" name="pwd1" type="password" required="" value="<?php echo $rs[7] ?>">
			</div>

			<input type="submit" name="change" value="更改">
		</form>
	</div>
	<?php
		if(isset($_POST["change"])){
			$link = @mysqli_connect("localhost","root","") 
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
			
			if(!isset($_SESSION)) 
            { 
              session_start(); 
            } 
	
            $member = $_SESSION['account'];
			
			
			if($user_pwd == $user_pwd1){
			$sql = "UPDATE userdata SET 姓名 = '$user_name' , 暱稱 = '$user_nick' , 手機號碼 = '$user_phone', 電子信箱 = '$user_mail', 地址 = '$user_address', 帳號 = '$user_account', 密碼 = '$user_pwd' 
			WHERE 帳號 = '$member' ";
			
			
			mysqli_query($link, 'SET NAMES utf8'); 
			mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
			if ( mysqli_query($link, $sql) ){ 
				header("Refresh: 2; url=../buyer/buyer.php?act=person"); 
				
			}
			else 
				die("資料庫更改記錄失敗<br/>");
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




