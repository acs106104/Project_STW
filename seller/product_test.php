<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content=""/>
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />

<script>
function readURL(input){
  if(input.files && input.files[0]){
    var imageTagID = input.getAttribute("targetID");
    var reader = new FileReader();
    reader.onload = function (e) {
       var img = document.getElementById(imageTagID);
       img.setAttribute("src", e.target.result)
    }
    reader.readAsDataURL(input.files[0]);
  }
}
</script>

   <script>
			addEventListener("load", function () {
				setTimeout(hideURLbar, 0);
			}, false);
	
			function hideURLbar() {
				window.scrollTo(0, 1);
			}
	</script>
</head>
<body>
<?php
// 是否是表單送回
if (isset($_POST["Insert"])) {
	if($_POST["Sno"]=="" || $_POST["Name"] == "" || $_POST["Catalog"] == "" || $_POST["Prize"] == "" || $_POST["Description"] == "" ){
		echo "全部資料皆要填寫，不可空白";
	}
	else{
	session_start();
   //賣家(要改)
    //$_SESSION['account']="ACS106104";
    $Seller=$_SESSION['account'];
	
    $img1=$_FILES["Image1"]["name"];
    $img2=$_FILES["Image2"]["name"];
    $img3=$_FILES["Image3"]["name"];
	
	//新增資料夾
	$tmp_file_path="upload/$Seller/";
	if(is_dir($tmp_file_path)){}
	else{
		mkdir($tmp_file_path,0700);
	}
	//圖片存到資料夾
    move_uploaded_file($_FILES["Image1"]["tmp_name"],"upload/$Seller/".$_FILES["Image1"]["name"]);
    move_uploaded_file($_FILES["Image2"]["tmp_name"],"upload/$Seller/".$_FILES["Image2"]["name"]);
    move_uploaded_file($_FILES["Image3"]["tmp_name"],"upload/$Seller/".$_FILES["Image3"]["name"]);
	
   // 開啟MySQL的資料庫連接
   $link = @mysqli_connect("localhost","root","") 
         or die("無法開啟MySQL資料庫連接!<br/>");
   mysqli_select_db($link, "userdata");  // 選擇資料庫
   
   // 建立新增記錄的SQL指令字串
   $sql ="INSERT INTO list (sno, pname, pcatalog, ";
   $sql.="prize,quantity,description,seller,image1,image2,image3) VALUES ('";
   $sql.=$_POST["Sno"]."','".$_POST["Name"]."','";
   $sql.=$_POST["Catalog"]."','".$_POST["Prize"]."','".$_POST["Quantity"]."','".$_POST["Description"]."','".$Seller."','".$img1."','".$img2."','".$img3."')";

   //送出UTF8編碼的MySQL指令
   mysqli_query($link, 'SET NAMES utf8'); 
   if ( mysqli_query($link, $sql) ) // 執行SQL指令
      echo "新增成功<br/>";
   else
      echo "新增失敗,可能原因:此編號已經被使用過<br/>";
   mysqli_close($link);      // 關閉資料庫連接	
   }

}

if(isset($_POST["returnHome"])){
   header("Location: ../buyer/buyer.php"); 
}

?>
<div class="sub-main-w3">
<form action="product_test.php" method="post" Enctype="multipart/form-data">
<h2><b>物品上架</b>
	<i class="fas fa-level-down-alt"></i>
</h2>

<div class="form-style-agile">
	<label>
		<i class="fas fa-unlock-alt"></i>
		編號
	</label>
				<input placeholder="編號" name="Sno" type="text" >
</div>

<div class="form-style-agile">
	<label>
		<i class="fas fa-unlock-alt"></i>
		名稱
	</label>
				<input placeholder="名稱" name="Name" type="text" >
</div>

<div class="form-style-agile">
	<label>
		<i class="fas fa-unlock-alt"></i>
      分類
   <select name="Catalog">
      <option value="其他" selected="True">其他</option>
      <option value="日用品"><font size=30px>日用品</option>
      <option value="家具">家具</option>
      <option value="服飾">服飾</option>
      <option value="裝飾">裝飾</option>
      <option value="文具">文具</option>
      <option value="書籍">書籍</option>
   </select>
	</label>		
</div>

<div class="form-style-agile">
	<label>
		<i class="fas fa-unlock-alt"></i>
		定價
	</label>
				<input placeholder="定價" name="Prize" min="0" type="number"  style="font-size:20px">
</div>

<div class="form-style-agile">
	<label>
		<i class="fas fa-unlock-alt"></i>
		數量
	</label>
				<input placeholder="數量" name="Quantity" min="0" type="number"  style="font-size:20px"/>
</div>

<div class="form-style-agile">
	<label>
		<i class="fas fa-unlock-alt"></i>
		描述
	</label>
      <textarea name="Description" rows="5" cols="40"></textarea>
</div>

<table border="1" width="350px" height="500px">
<tr><td>圖片:<input type="file" name="Image1" onchange="readURL(this)" targetID="preview_progressbarTW_img1" accept="image/gif, image/jpeg, image/png" >
   <img id="preview_progressbarTW_img1" src="#" ,width="150" height="300" /></td></tr>
<tr><td><input type="file" name="Image2" onchange="readURL(this)" targetID="preview_progressbarTW_img2" accept="image/gif, image/jpeg, image/png"/ >
   <img id="preview_progressbarTW_img2" src="#" ,width="150" height="300" /></td></tr>
<tr><td><input type="file" name="Image3" onchange="readURL(this)" targetID="preview_progressbarTW_img3" accept="image/gif, image/jpeg, image/png"/ >
   <img name="test" id="preview_progressbarTW_img3" src="#" ,width="150" height="300" /></td></tr>
</table>

<input type="submit" name="Insert" value="新增"/>
<input type ="submit"name="returnHome" value="返回"/>

</form>
</div>

</body>
</html>