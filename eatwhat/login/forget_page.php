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

        <div class="login d-flex flex-colunm justify-content-center m-auto p-5">
            <div class="contanier">

                <div class="col ">
                    <div class="log_title " >
                        查詢密碼
                    </div>
                    <form action="forget.php" method = 'post'>
                        <div class="mail row-auto" >
                            <input type="text" name="mail" id="mail" placeholder="電子郵件" class="textbox">
                        </div>
                        <div class="username row-auto pt-5">
                            <input type="text" name="username" id="username" placeholder="使用者帳號" class="textbox">
                        </div>
                        <input type="submit" value="查詢" class="login_btn w-100 mt-5 mb-2">
                        
                    </form>
                </div>

            </div>
        </div>

    </div>
</body>
</html>