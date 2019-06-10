<!-- 程式範例：delete.php -->
<?php
$id = $_GET["Id"];  // 取得URL參數
if ( isset($_COOKIE[$id]) ) { // 檢查Cookie是否存在
   // 存在, 刪除陣列Cookie
   while ( list($name, $value) = each($_COOKIE[$id]) )
      setcookie($id."[".$name."]", "", time()-3600); 
}
header("Location: shoppingcart.php");  // 轉址
?>