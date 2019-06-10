<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8" />

<style>
.background_title {
  border: 1px solid black;
  margin: auto;
  width: 1000px;
  height: 125px;
  background-color:#c1f0c1;
}
.background_content {
  border: 1px solid black;
  margin: auto;
  width: 1000px;
  height: 1800px;
  /*background-color:#d6f5d6;*/
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #009933;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: #cc99ff;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f2e6ff;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
  
p { white-space: nowrap; }
}

</style>
</head>

<body>
<div class="background_title">
<a href="../home/home.html">
<img src = "主圖.png" alt="=Home picture" width="200" height="80" ></a>

<a href="?act=person">
<?php session_start();
        if($_SESSION['account']){
            echo"<p>"."歡迎,".$_SESSION['account']."</p>";
            //session_unset();
        }
		?></a>
		

</div>
<div class="background_title">
<ul>
        <li>會員專區</li><br>
		<li><a href="../home/home.php">回首頁</a></li>
        <li><a href="buyer.php?act=person">個人資料</a></li>
		<li><a href="buyer.php?act=change">更改個人資料</a></li>
        <li><a href='buyer.php?act=search'>訂單查詢</a></li>
        <li><a href='buyer.php?act=buycar'>購物車</a></li>
		<li><a href='buyer.php?act=point'>我的積分</a></li>
        <li><a href="../contact_Us/contact.html">聯絡我們</a></li>
        <li><a href="../Login/Login.php">登出</a></li>
</ul>
</div>



<div class="background_content">
<?php



$act = @$_GET['act'];
  switch($act){
  case 'person':
    include 'person.php';
    break;
  case 'change':
    include 'change.php';
    break;
  case 'search':
    include 'search.php';
    break;
  case 'buycar':
    include 'buycar.php';
    break;
  case 'point':
    include 'point.php';
    break;
  default:
    echo "買家小天地";
    break;
}

?>

</div>



</body>
</html>