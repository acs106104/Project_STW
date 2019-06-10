<?php


	$link = @mysqli_connect("localhost","root","") 
					or die("無法開啟MySQL資料庫連接!<br/>");
	mysqli_select_db($link, "userdata");
			
	
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
    $member = $_SESSION['account'];	
	$check_laccount = "SELECT * FROM userdata WHERE 帳號 = '$member' ";
	  
	mysqli_query($link, 'SET NAMES utf8'); 
	$result_laccount = mysqli_query($link, $check_laccount);
	if(!$result_laccount)
	{
		echo ("Error: ".mysqli_error($link));
		exit();
	}
	   
	$rows=mysqli_fetch_array($result_laccount);  
	
	
	
	
	
?>
   <link rel="stylesheet" href="style.css" type="text/css" media="all" />
   

    <b>姓名: </b> <?php  echo $rows["姓名"];?> <br/>
	<b>暱稱: </b> <?php  echo $rows["暱稱"];?> <br/>
	<b>手機號碼: </b> <?php  echo $rows["手機號碼"];?> <br/>
	<b>電子郵箱: </b> <?php  echo $rows["電子信箱"];?> <br/>
	<b>地址: </b> <?php  echo $rows["地址"];?> <br/>
	<b>帳號: </b> <?php  echo $rows["帳號"];?> <br/>
	<b>密碼: </b> <?php  echo $rows["密碼"];?> <br/>
	


	
   
		
	




