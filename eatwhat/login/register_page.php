<?php $conn = require_once "../config/db.php"; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>吃啥呢</title>

    <!-- 圖示網站 -->
    <script src="https://kit.fontawesome.com/5770cface6.js" crossorigin="anonymous"></script>

    <!-- bootstreap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- css -->
    <link rel="stylesheet" href="css/style_login.css">

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</head>
<body>
    <div class="d-flex flex-column h-100">

        <header class="header d-flex justify-content-center ">

            <div class="menu d-flex ">
                <div class="container">
                    
                    <div class="logo justify-content-center" >
                        <a href="index.php">
                            <img src="../image/logo2.jpg" style="margin-bottom: 5px; width: 8rem;">
                            <span><b>吃啥呢</b></span> 
                        </a>

                    </div>

                </div>
            </div>

        </header>        

        <div class="register d-flex flex-colunm justify-content-center m-auto p-5">
            <div class="contanier">

                <div class="col ">
                    <div class="log_title " >
                        註冊帳號
                    </div>

                    <form name="registerForm" method="post" action="register.php" onsubmit="return validateForm()">
                        帳&emsp;&emsp;號：
                        <input type="text" name="username" class="textbox"><br/><br/>
                        密&emsp;&emsp;碼：
                        <input type="password" name="password" id="password" class="textbox"><br/><br/>
                        確認密碼：
                        <input type="password" name="password_check" id="password_check" class="textbox"><br/><br/>
                        email&emsp;&nbsp;：
                        <input type="email" name="email" id="email" class="textbox"><br/><br/>
                        <input type="submit" value="註冊" name="submit" class="login_btn w-100 mt-2 mb-2">
                        <input type="reset" value="重設" name="submit" class="login_btn w-100 mt-3 mb-2">
                    </form>

                    
                </div>

            </div>
        </div>

    </div>
</body>
</html>