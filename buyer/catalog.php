<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>catalog.php</title>

</head>

<body>
<?php session_start();  // 啟用交談期
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
圖片:<br/>
<?php if($rs[7]!=null){echo "<img alt=無照片 src=\"./upload/".$rs[6]."/".$rs[7]."\" width200 height=275/>";}?><br/>
<?php if($rs[8]!=null){echo "<img alt=無照片 src=\"./upload/".$rs[6]."/".$rs[8]."\" width200 height=275/>";}?><br/>
<?php if($rs[9]!=null){echo "<img alt=無照片 src=\"./upload/".$rs[6]."/".$rs[9]."\" width200 height=275/>";}?><br/>

名稱:<?php echo $rs[1]?><br/>
分類:<?php echo $rs[2]?><br/>
定價:<?php echo $rs[3]?><br/>
數量:<?php echo $rs[4]?><br/>
描述:<?php echo $rs[5]?><br/>
賣家:<?php echo $rs[6]?><br/>

編號:<?php echo $rs[0]?><br/>

<?php $number = $rs[0];?>
<?php $name = $rs[1];?>
<?php $price = $rs[3];?>
<?php $quantity = $rs[4];?>
<br/>

<form action="catalog.php" method="post">

<input type = "hidden" name = "id" value = <?=$number?> >
<input type = "hidden" name = "Quantity" value = <?=$quantity?> >
<input type = "hidden" name = "Name" value = <?=$name?> >
<input type = "hidden" name = "Price" value = <?=$price?> >

<input type="submit" value="加入購物車" name = "love"><br/>

</form>
<hr/>

<?php } ?>

<?php




	$id = $_POST["id"];
	$Quantity = $_POST["Quantity"];
	$Name = $_POST["Name"];
	$Price = $_POST["Price"];
	
	
   // 取得購買的數量
   $_SESSION["Quantity"] = $Quantity;
   $id = $rs[0];  // 取得選擇商品
   $_SESSION["ID"] = $id; // 建立Session變數
   $_SESSION["Name"] = $Name;
   $_SESSION["Price"] = $Price;
 
   header("Location: savecart.php");  // 轉址

?>
</table>
<hr/>| <a href="catalog.php">商品目錄</a>
| <a href="shoppingcart.php">檢視購物車</a> |



</div>
</body>
</html>