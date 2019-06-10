<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>product.php</title>
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
    $_SESSION['account']="ACS106132";
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
   mysqli_select_db($link, "product");  // 選擇資料庫
   
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

?>
<h1>物品上架</h1>
<form action="product_test.php" method="post" Enctype="multipart/form-data">
<table border="1">
<tr><td colspan="3">編號:<input type="text" name="Sno" size ="20"/></td>
</tr><tr><td colspan="3">名稱:<input type="text" name="Name" size ="20"/></td>  
</tr><tr><td colspan="3">分類:<select name="Catalog">
   <option value="其他" selected="True">其他</option>
   <option value="日用品">日用品</option>
   <option value="家具">家具</option>
   <option value="服飾">服飾</option>
   <option value="裝飾">裝飾</option>
   <option value="文具">文具</option>
   <option value="書籍">書籍</option>
</select></td>
</tr><tr><td colspan="3">定價:<input type="number" min="0" name="Prize" size="15"/></td>
</tr><tr><td colspan="3">數量:<input type="number" min="0" name="Quantity" size="15"/></td>
</tr><tr><td colspan="3">描述:<textarea name="Description" rows="5" cols="50"></textarea></td></tr>
<tr><td>圖片:<input type="file" name="Image1" onchange="readURL(this)" targetID="preview_progressbarTW_img1" accept="image/gif, image/jpeg, image/png" ><br/>
   <img id="preview_progressbarTW_img1" src="#" ,width="150" height="300" /></td>
<td><input type="file" name="Image2" onchange="readURL(this)" targetID="preview_progressbarTW_img2" accept="image/gif, image/jpeg, image/png"/ ><br/>
   <img id="preview_progressbarTW_img2" src="#" ,width="150" height="300" /></td>
<td><input type="file" name="Image3" onchange="readURL(this)" targetID="preview_progressbarTW_img3" accept="image/gif, image/jpeg, image/png"/ ><br/>
   <img name="test" id="preview_progressbarTW_img3" src="#" ,width="150" height="300" /></td>
</tr>
</table><hr/>

<input type="submit" name="Insert" value="新增"/>
<input type ="button" onclick="history.back()" value="取消"/>
</form>

</body>
</html>