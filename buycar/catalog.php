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
<?php session_start();
    //ob_start();
if ( isset($_POST["id"]) ) {
    $id = (isset($_POST['id']) ? $_POST['id'] : '');
	$Quantity = (isset($_POST['id']) ? $_POST["Quantity"] : '');
	$Name = (isset($_POST['id']) ? $_POST["Name"] : '');
	$Price = (isset($_POST['id']) ? $_POST["Price"] : '');


	
   // 取得購買的數量
   $_SESSION["Quantity"] = $Quantity;
   $_SESSION["ID"] = $id; // 建立Session變數
   $_SESSION["Name"] = $Name;
   $_SESSION["Price"] = $Price;
   
header("Location:savecart.php");
//ob_end_flush();
}
?>
</head>

<body>
<?php   // 啟用交談期

   // 開啟MySQL的資料庫連接
   $link = @mysqli_connect("localhost","root","") 
         or die("無法開啟MySQL資料庫連接!<br/>");
   mysqli_select_db($link, "userdata");  // 選擇資料庫
   mysqli_query($link, 'SET NAMES utf8'); 
   $data=mysqli_query($link,"SELECT * FROM list");
?>

<div class="sub-main-w3">
<form action="catalog.php" method="post">
<div class="form-style-agile">
<h2><b>商品</b>
	<i class="fas fa-level-down-alt"></i>
</h2>

<table border="1" width="350px" height="500px">
<?php
for($i=1;$i<=mysqli_num_rows($data);$i++){
	$rs=mysqli_fetch_row($data);
?>
圖片:<br/>

<?php if($rs[7]!=null){echo "<img alt=無照片 src=\"../seller/upload/".$rs[6]."/".$rs[7]."\" width=200 height=275/>";}?><br/>
<?php if($rs[8]!=null){echo "<img alt=無照片 src=\"../seller/upload/".$rs[6]."/".$rs[8]."\" width=200 height=275/>";}?><br/>
<?php if($rs[9]!=null){echo "<img alt=無照片 src=\"../seller/upload/".$rs[6]."/".$rs[9]."\" width=200 height=275/>";}?><br/>

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


<input type = "hidden" name = "id" value = <?=$number?> >
<input type = "hidden" name = "Quantity" value = <?=$quantity?> >
<input type = "hidden" name = "Name" value = <?=$name?> >
<input type = "hidden" name = "Price" value = <?=$price?> >

<input type="submit" value="加入購物車" name = "love"><br/>
<hr/>
</div>
</form>
</div>


<?php } ?>
 <a href="catalog.php">商品目錄</a>
| <a href="shoppingcart.php">檢視購物車</a> |
<a href="../buyer/buyer.php">返回會員專區</a> |
</table>
</body>
</html>