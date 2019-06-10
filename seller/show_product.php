<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>show_product.php</title>
</head>
<body>
<?php
   // 開啟MySQL的資料庫連接
   $link = @mysqli_connect("localhost","root","") 
         or die("無法開啟MySQL資料庫連接!<br/>");
   mysqli_select_db($link, "userdata");  // 選擇資料庫
   mysqli_query($link, 'SET NAMES utf8'); 
   $data=mysqli_query($link,"SELECT * FROM list");
?>
<h1>商品</h1>
<table border="1">
<?php
for($i=1;$i<=mysqli_num_rows($data);$i++){
	$rs=mysqli_fetch_row($data);
?>
編號:<?php echo $rs[0]?><br/>
名稱:<?php echo $rs[1]?><br/>
分類:<?php echo $rs[2]?><br/>
定價:<?php echo $rs[3]?><br/>
數量:<?php echo $rs[4]?><br/>
描述:<?php echo $rs[5]?><br/>
賣家:<?php echo $rs[6]?><br/>
圖片:<br/>

<?php if($rs[7]!=null){echo "<img alt=無照片 src=\"./upload/".$rs[6]."/".$rs[7]."\" width200 height=275/>";}?><br/>
<?php if($rs[8]!=null){echo "<img alt=無照片 src=\"./upload/".$rs[6]."/".$rs[8]."\" width200 height=275/>";}?><br/>
<?php if($rs[9]!=null){echo "<img alt=無照片 src=\"./upload/".$rs[6]."/".$rs[9]."\" width200 height=275/>";}?><br/>
<?php } ?>

</table>
</body>
</html>