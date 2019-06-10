<!DOCTYPE html>
<head>
<title>Log in</title>
<meta charset="utf-8" />
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
<div class="tabs">        
<div class="tab">         
 <input type="radio" id="tab1" name="tabs" checked="checked">          
<label for="tab1">登入</label>          
<div class="content">
<form action="log.php" method="post">
  帳號: <input type="text" name="laccount"><br><br>
  密碼: <input type="password" name="password" maxlength="10"><br><br>
  驗證碼: <input type="text" name="code1" maxlength="5">
<table border= "1">
<?php
$rand1 = rand(10000,99999);
$temp=$rand1;
print "<tr>";
print "<td><b><font color='red' size='5'> " . $rand1 . " </font></b></td><br><br>";
?>
<input type="hidden" name="cc" value="<?php echo $rand1; ?>">
</table>
<br><br>
  <input type="submit" name="login" value="登入">
</form></div>     
 </div>  
 
 <div class="tab">          
<input type="radio" id="tab2" name="tabs">          
<label for="tab2">註冊</label>         
 <div class="content">
 <form action="log.php" method="post">
  姓名: <input type="text" name="name"><br><br>
  
  暱稱: <input type="text" name="nick"><br><br>
  手機號碼: <input type="text" name="phone"><br><br>
  電子信箱: <input type="text" name="mail"><br><br>
  地址: <input type="text" name="address"><br><br>
  帳號: <input type="text" name="account"><br><br>
  密碼: <input type="password" name="pwd" maxlength="8"><br><br>
  確認密碼: <input type="password" name="pwd1" maxlength="8"><br><br>
  驗證碼: <input type="text" name="code2" maxlength="5">
  <table border= "1">
<?php
$rand2 = rand(10000,99999);
print "<tr>";
print "<td><b><font color='red' size='5'> " . $rand2 . " </font></b></td><br><br>";
?>
<input type="hidden" name="cc2" value="<?php echo $rand2; ?>">
</table>
  <br><br>
  <input type="submit" name="register" value="註冊">
</form></div>     
 </div>            
 
</div> 

<?php

if(isset($_POST["login"])){
	$link = @mysqli_connect("localhost","root","A12345678") 
         or die("無法開啟MySQL資料庫連接!<br/>");
   mysqli_select_db($link, "userdata");
   
   
   if($_POST['laccount']=="" || $_POST['password'] == "" || $_POST['code1'] == ""){
	   echo "帳號或密碼或驗證碼不可空白";
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


if(isset($_POST["register"])){
	$link = @mysqli_connect("localhost","root","A12345678") 
         or die("無法開啟MySQL資料庫連接!<br/>");
   mysqli_select_db($link, "userdata");
   
   if($_POST['name']=="" || $_POST['nick'] == "" || $_POST['phone'] == "" || $_POST['mail'] == "" || $_POST['address'] == "" || $_POST['account'] == "" || $_POST['pwd'] == "" || $_POST['pwd1'] == "" || $_POST['code2'] == ""){
	   echo "全部資料皆要填寫，不可空白";
   }
   else if($_POST['code2'] != $_POST['cc2']){
	   echo "驗證碼錯誤";
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
   if ( mysqli_query($link, $sql) ) // 執行SQL指令
      echo "註冊成功 <br/>";
   else
      die("資料庫新增記錄失敗<br/>");
   }
   else
	   echo "密碼不相符";
  
   mysqli_close($link);
   }
}
	
?>
</body>
</html>
