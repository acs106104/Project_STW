<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>search.php</title>
</head>
<body>

<form action="search.php" method="post">
<h1>搜尋</h1>
按分類搜尋:
<select name="Catalog">
   <option value="其他" selected="True">其他</option>
   <option value="日用品">日用品</option>
   <option value="家具">家具</option>
   <option value="服飾">服飾</option>
   <option value="裝飾">裝飾</option>
   <option value="文具">文具</option>
   <option value="書籍">書籍</option>
</select>
關鍵字搜尋
<input type="text" name="Need" size ="10"/>
<input type="submit" name="Insert" value="搜尋"/>
</form>

<?php
//按分類搜尋
if (isset($_POST["Catalog"])){
   @$catalog=$_POST["Catalog"];
   // 開啟MySQL的資料庫連接
   $link = @mysqli_connect("localhost","root","") 
         or die("無法開啟MySQL資料庫連接!<br/>");
   mysqli_select_db($link, "product");  // 選擇資料庫
   mysqli_query($link, 'SET NAMES utf8');
   $str="SELECT * FROM list WHERE pcatalog  IN ('".$catalog."')";
   $data=mysqli_query($link,$str);
}
//關鍵字搜尋
if (isset($_POST["Need"])){
   @$need=$_POST["Need"];
   // 開啟MySQL的資料庫連接
   $link = @mysqli_connect("localhost","root","") 
         or die("無法開啟MySQL資料庫連接!<br/>");
   mysqli_select_db($link, "product");  // 選擇資料庫
   mysqli_query($link, 'SET NAMES utf8');
   $str="SELECT * FROM list WHERE pname LIKE '%".$need."%'";
   $data=mysqli_query($link,$str);
}

?>

<h1>商品</h1>
<table border="1">
<?php
for($i=1;$i<=@mysqli_num_rows($data);$i++){
	$rs=@mysqli_fetch_row($data);
?>
編號:<?php echo $rs[0]?><br/>
名稱:<?php echo $rs[1]?><br/>
分類:<?php echo $rs[2]?><br/>
定價:<?php echo $rs[3]?><br/>
數量:<?php echo $rs[4]?><br/>
描述:<?php echo $rs[5]?><br/>
賣家:<?php echo $rs[6]?><br/>
圖片:<br/>

<?php echo "<img alt=無照片 src=../upload/".$rs[6]."/".$rs[7]." width=200 height=275/>";?><br/>
<?php echo "<img alt=無照片 src=../upload/".$rs[6]."/".$rs[8]." width200 height=275/>";?><br/>
<?php echo "<img alt=無照片 src=../upload/".$rs[6]."/".$rs[9]." width=200 height=275/>";?><hr/>
<?php } ?>

</table>

</body>
</html>