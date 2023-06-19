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

    <!-- swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- css -->
    <link rel="stylesheet" href="css/style_login.css">

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</head>

<body>
    <div class="d-flex flex-column h-100">

        <!-- header start -->

        <header class="header d-flex justify-content-center">

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

        <!-- header end -->

        <!-- login start -->

        <div class="login d-flex flex-colunm justify-content-center m-auto p-5">
            <div class="contanier">

                <div class="col ">
                    <div class="log_title " >
                        登入
                    </div>
                    <form action="login.php" method = 'post'>
                        <div class="username row-auto" >
                            <input type="text" name="username" id="username" placeholder="使用者帳號" class="textbox">
                        </div>
                        <div class="password row-auto pt-5">
                            <input type="password" name="password" id="password" placeholder="密碼" class="textbox">
                        </div>
                        <div>
                            <input type="submit" value="登入" class="login_btn w-100 mt-5 mb-2">
                            <a href="register_page.php" class="register_btn mt-3 mb-2" >註冊</a>
                            <!-- <input type="submit" value="註冊" class="login_btn w-100 mt-5 mb-2"> -->
                        </div>

                        
                    </form>
                </div>
                <div class="forget d-flex flex-colunm justify-content-center ">
                    <a href="forget_page.php" class="forget">忘記密碼</a>
                </div>
            </div>
        </div>
        
        <!-- login end -->
        
    </div>
</body>

</html>