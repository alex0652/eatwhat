<?php $conn = require_once "config/db.php"; ?>
<?php require_once 'search.php'; ?>

<?php
    $datas_p = array();
    $sql_p = "SELECT * FROM `store`
                    WHERE u_id = ".$_SESSION["u_id"];
    $result_p = mysqli_query($link,$sql_p);
    if ($result_p) {
        if (mysqli_num_rows($result_p)>0) {
            while ($row_p = mysqli_fetch_assoc($result_p)) {
                $datas_p[] = $row_p;
            }
        }
    }
    else {
        echo "{$sql_p} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
    }
    $num = count($datas_p);
    $rand = rand(0,$num-1);
    $temp = 0; 


    $sql_type = ["time","class","location"];
    $sql_temp = ["", "", ""] ;
    $sql_list = ["", "", ""] ;
    $sql_data = ["", "", ""] ;
    $sql = [$sql0 = "", $sql1 = "", $sql2 = ""];
    $result = [$result0 = "", $result1 = "", $result2 = ""];

    for ($i = 0; $i < 3; $i++){
        $sql_data[$i] = array();
        $sql[$i] = "SELECT `$sql_type[$i]` FROM `user`
                WHERE `u_id` = ".$_SESSION["u_id"];
        $result[$i] = mysqli_query($link,$sql[$i]);
        if ($result[$i]) {
            if (mysqli_num_rows($result[$i])>0) {
                while ($row = mysqli_fetch_assoc($result[$i])) {
                $sql_data[$i] = $row;
                }
            }
            $result[$i]->close();
        }
        $sql_temp[$i] = $sql_data[$i];
        $sql_temp[$i] = $sql_temp[$i]["$sql_type[$i]"];
        $sql_list[$i] = preg_split('/,/',$sql_temp[$i]);
    }

?>

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
    <link rel="stylesheet" href="css/style.css">

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</head>
    
<body>
    

    <div class="d-flex flex-column h-100">

        <!-- header start -->
        <header class="header d-flex ">
            
            <div class="menu d-flex ">
                <nav class="navbar bg-lignt" aria-label="Light offcanvas navbar">
                    <div class="container-fluid">
                        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="offcanvas"data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight" style="font-size: 2.5rem;">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                        <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasNavbarLight"aria-labelledby="offcanvasNavbarLightLabel">
                            <div class="offcanvas-header menu_text_1">
                                <div>吃啥呢選單</div>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body menu_text_2">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="user/index.php">個人資料</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="store/index.php">新增店家</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="store/show_store.php">查詢店家</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="time/index.php">節日提醒</a>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="menu_title">
                <!-- <i class="fa-solid fa-bars"></i> -->
                <a href="#">
                    <img src="image/logo.png" style="margin-bottom: 5px; width: 13rem;">
                </a>
            </div>

            <div class="search">
                <!-- <i class="fa-sharp fa-solid fa-magnifying-glass"></i> -->
                <form method="post" action="index.php">     
                    <input type="text" class="search-box" id="search_box" name="search_box"  placeholder="請搜尋餐廳">
                </form>
            </div>

            <div class="user">
                <span>
                    <?php
                        echo $_SESSION["username"];
                    ?>
                    你好
                </span>
                
                <a href="login/logout.php" class="login_btn">登出</a>
            </div>

        </header>
        <!-- header end -->

        <!-- home start -->
        <div class="home d-flex flex-column " >

            <div id="myCarousel" class="carousel slide main_section" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
            
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="image/home1.png" class="slider_img" alt="">
                        <div class="container">
                            <div class="show carousel-caption text-start">
                                節慶提醒
                                <!-- <p>Some representative placeholder content for the first slide of the carousel.</p> -->
                                <p><a class="home_btn" href="time/index.php">查看時間</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="image/home4.png" class="slider_img" alt="">
                        <div class="container">
                            <div class="show carousel-caption">
                                開始抽取
                                <!-- <p>Some representative placeholder content for the second slide of the carousel.</p> -->
                                <p><a class="home_btn" href="#" >開始選擇</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="image/home3.png" class="slider_img" alt="">
                        <div class="container">
                            <div class="show carousel-caption text-end">
                                設定店家資料
                                <!-- <p>Some representative placeholder content for the third slide of this carousel.</p> -->
                                <p><a class="home_btn" href="store/index.php">設定資料</a></p>
                            </div>
                        </div>

                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>

        </div>
        <!-- home end   -->

        <!-- choose start -->
        <div class="choose d-flex">
            <div class="container">

                <div class="choose_main d-flex justify-content-evenly" >
                    <div>
                        時間
                        <select name="search_time" id = "search_time">
                            <?php if(!empty($sql_list[0])): ?>
                                <?php foreach ($sql_list[0] as $key => $row) :?>
                                    <?php echo "<option>".$row."</option></br>" ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    
                    <div>
                        種類
                        <select name="search_class" id = "search_class">
                            <?php if(!empty($sql_list[1])): ?>
                                <?php foreach ($sql_list[1] as $key => $row) :?>
                                    <?php echo "<option>".$row."</option></br>" ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    
                    <div>
                        地點
                        <select name="search_location" id = "search_location">
                            <?php if(!empty($sql_list[2])): ?>
                                <?php foreach ($sql_list[2] as $key => $row) :?>
                                    <?php echo "<option>".$row."</option></br>" ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    
                </div>

            </div>    
        </div>
        <!-- choose end -->

        <!-- pick start -->
        <div class="pick d-flex">
            <div class="container justify-content-between">             
                <div class="pick_main d-flex justify-content-between">
                    <div class="start">
                        <input type="button"  data-bs-toggle="modal" 
                                    data-bs-target="#myApparel" value="開始抽取" onclick="extract();">
                        
                    </div>
                    <div class="clear">
                        <button onclick="clear_select();">清除選項</button>
                        <script>
                            function clear_select(){
                                let select_time = document.getElementById("search_time");
                                let select_class = document.getElementById("search_class");
                                let select_location = document.getElementById("search_location");
                                select_time.selectedIndex = 0;
                                select_class.selectedIndex = 0;
                                select_location.selectedIndex = 0;
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!-- pick end -->

        <div class="show_menu d-flex justify-content-center mt-5">
            <div class="container">

                <?php if(!empty($datas)): ?>
                    <table width='100%' height='120'>
                    <tr>
                        <td heigth='120'>店名</td>
                        <td>營業時間</td>
                        <td>標籤</td>
                        <td>菜單</td>
                    </tr>


                    <?php foreach ($datas as $key => $row) :?> 
                        <tr>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['open_time'];?>
                                <?php echo $row['close_time'];  ?>
                            </td>
                            <td>
                                <?php echo $row['time'] . "&nbsp;&nbsp;";?>
                                <?php echo $row['class'] . "&nbsp;&nbsp;";?>
                                <?php echo $row['location'];?>
                            </td>
                            <td>
                                <a href="./store/show_menu.php?id=<?php echo $row["s_id"]; ?>">菜單</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                <?php else:  ?>
                    查無資料
                <?php endif; ?>

            </div>
        </div>
        
        <div class="modal fade" id="myApparel" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
        style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header ">
                        <span>抽取結果</span>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="res">
                        <?php
                            $result = mysqli_query($link,$sql_p);
                            if ($result) {
                                if (mysqli_num_rows($result)>0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $datas_name[] = $row["name"];
                                        $datas_time[] = $row["time"];
                                        $datas_class[] = $row["class"];
                                        $datas_location[] = $row["location"];
                                    }
                                }
                                $result->close();
                                $str_name=json_encode($datas_name);
                                $str_time=json_encode($datas_time);
                                $str_class=json_encode($datas_class);
                                $str_location=json_encode($datas_location);
                            }
                        ?>
                        <!-- 處理抽取動作 -->
                        <script>
                        // 初始化顯示div
                        const res = document.getElementById("res");
                        // 初始化店家資料
                        let arr_name = <?php echo $str_name ?>;
                        let arr_time = <?php echo $str_time ?>;
                        let arr_class = <?php echo $str_class ?>;
                        let arr_location = <?php echo $str_location ?>;
                        // 初始化下拉式選單選擇項
                        let select_time, select_class, select_location;
                        // 初始化抽取陣列(0,1,2,...,arr_name.length-1)
                        let extract_arr = Array.from(Array(arr_name.length).keys())
                        // 按下抽取後執行的韓式(料理)
                        function extract() {
                            // 抽取亂數
                            shuffle(extract_arr);
                            // 按下抽取後取得下拉式清單選擇項
                            select_time = document.getElementById("search_time").value;
                            select_class = document.getElementById("search_class").value;
                            select_location = document.getElementById("search_location").value;
                            // 計數顯示個數(之後可改為顯示多個再break)
                            let display_count = 0;
                            // 走訪陣列(extract_arr的index)，若都符合條件則顯示並結束迴圈
                            for (var x = 0; x < arr_name.length; x++) {
                                if (arr_time[extract_arr[x]] === select_time || select_time === "")
                                    if (arr_class[extract_arr[x]] === select_class || select_class === "")
                                        if (arr_location[extract_arr[x]] === select_location || select_location === "") {
                                            res.innerHTML = arr_name[extract_arr[x]];
                                            display_count++;
                                            if (display_count == 1) break; // 這段雖然看起來很沒用，主要用在顯示多個的情況
                                        }
                            }
                            // 處理如果篩選後都沒有的情況
                            if (display_count == 0) res.innerHTML = "找不到你所選的餐廳欸¯\_(ツ)_/¯";

                        }
                        // JS機率較平均的隨機陣列(Source:https://shubo.io/javascript-random-shuffle/)
                        function shuffle(array) {
                            for (let i = array.length - 1; i > 0; i--) {
                                let j = Math.floor(Math.random() * (i + 1));
                                [array[i], array[j]] = [array[j], array[i]];
                            }
                        }
                        </script>
                    </div>
                    <div class="modal-footer">

                    </div>
                
                </div>
            </div>
        </div>
                            
       
    </div>
</body>

</html>

