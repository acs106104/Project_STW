<?php
print "訂單查詢<br/>";

if(isset($_POST["register"])){
			$link = @mysqli_connect("localhost","root","1234") 
					or die("無法開啟MySQL資料庫連接!<br/>");
			mysqli_select_db($link, "userdata");
			
			
	$check_laccount = "SELECT * FROM userdata WHERE 帳號 = 'ACS106120'";
	  
	   mysqli_query($link, 'SET NAMES utf8'); 
	   $result_laccount = mysqli_query($link, $check_laccount);
	   if(!$result_laccount)
	   {
		  echo ("Error: ".mysqli_error($link));
		  exit();
	   }
	   
	   $rows=mysqli_fetch_array($result_laccount);
	   
	   
}

?>