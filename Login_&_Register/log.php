<!DOCTYPE html>
<head>
   <title>Log in</title>
   <meta charset="utf-8" />
   <link rel="stylesheet" href="styles.css">
</head>
<body>
   <center>
   <div class="tabs">     
      <div class="tab">         
      <input type="radio" id="tab1" name="tabs" checked="checked">          
      <label for="tab1">登入</label>          
         <div class="content">
            <form action="log.php" method="post">
            帳號: <input type="text" name="laccount"><br><br>
            密碼: <input type="password" name="password" maxlength="10"><br><br>
            <input type="submit" name="login" value="登入">
            </form>
         </div>     
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
         
         <input type="submit" name="register" value="註冊">
         </form>
      </div>    
   </div>            
   
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


   if(isset($_POST["register"])){
      $link = @mysqli_connect("localhost","root","A12345678") 
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
   </center>
</body>
</html>
