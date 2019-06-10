<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!--top導航菜單-->
    <?php
        echo"<ul>";
            echo"<li><a href=\"../Register/Register.php\"><div style=\"font-size: 60px\">註冊</div></a></li>";
        session_start();
        if(isset($_SESSION['account'])){
            echo"<li><a class=\"active\" href=\"../Login/Login.php\"><div style=\"font-size: 60px\">登出</div></a></li>";
            echo"<li><a><div style=\"font-size: 60px\">"."歡迎,".$_SESSION['account']."</div></a></li>";
            //session_unset();
        }
        else
            echo"<li><a class=\"active\" href=\"../Login/Login.php\"><div style=\"font-size: 60px\">登入</div></a></li>";
        echo"</ul>";
    ?>
    <!--home圖-->
    <center><img src="home圖.jpg" width="950px" height="650px" style="margin-top:10%"></center>
    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="home.html"><div style="font-size: 80px">首頁</div></a>
        <a href=""><div style="font-size: 80px">商品</div></a>
        <a href=""><div style="font-size: 80px">會員專區</div></a>
        <a href=""><div style="font-size: 80px">購物車</div></a>
        <a href=""><div style="font-size: 80px">關於我們</div></a>
        <a href="../contact_Us/contact.html"><div style="font-size: 80px">聯絡我們</div></a>
    </div>

    <center><img src="../pic/blank.png" width="950px" height="450px"></center>

    <!--FOOTER-->
    <div class="footer">
        <p align="center"><font size="5">地址:台中市XXX路168號-2 &emsp;&emsp;&emsp;客服專線:(04)22949889</font></p>
    </div>
</body>
</html>