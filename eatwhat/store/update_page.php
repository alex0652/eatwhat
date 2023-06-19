<?php $conn = require_once "../config/db.php"; ?>
<?php require_once '../config/select_store.php'; ?>

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
    <link rel="stylesheet" href="css/style_store.css">

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</head>
<body>
    <div class="d-flex flex-column h-100">

        <header class="header d-flex justify-content-center ">

            <div class="menu d-flex ">
                <div class="container">
                    
                    <div class="logo justify-content-center" >
                        <a href="../index.php">
                            <img src="../image/logo2.jpg" style="margin-bottom: 5px; width: 8rem;">
                            <span><b>吃啥呢</b></span> 
                        </a>

                    </div>

                </div>
            </div>

        </header>        

        <div class="home d-flex ">
            <div class="container">
                <?php echo'<form method="post" action="update.php?id='.$_GET["id"].'" enctype="multipart/form-data">'  ?>
                <?php '</form>' ?>
                    <div class="title" >更改店家資訊</div>
                    
                    <div class="name mt-4">
                        店名：
                        <input type="text"  size="10" name="name" id="name" class="textbox" value=<?php echo $_GET["name"]?>>
                    </div>

                    <div class="name mt-4">
                        營業時間
                        <input type="time" size="10" name="open_time" id="open_time" class="textbox" value=<?php echo $_GET["open_time"]?>>
                        ~ 
                        <input type="time" size="10" name="close_time" id="close_time" class="textbox" value=<?php echo $_GET["close_time"]?>>
                    </div>

                    <div class="name mt-4">
                        上傳圖片：
                        <input type="file" name="form_data" size="40" >
                    </div>
                    <?php
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
                    時間
                    <select name="time" id = "time">
                        <?php 
                            if (!empty($sql_list[0])):
                                foreach ($sql_list[0] as $key => $row):
                                    if($row == $_GET["time"])
                                        echo "<option selected>" . $row . "</option></br>" ;
                                    else
                                        echo "<option>" . $row . "</option></br>";
                                endforeach; 
                            endif; 
                        ?>
                    </select>

                    種類
                    <select name="class" id = "class">
                        <?php if(!empty($sql_list[1])): ?>
                            <?php foreach ($sql_list[1] as $key => $row) :?>
                                <?php echo "<option>".$row."</option></br>" ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>

                    地點
                    <select name="location" id = "location">
                        <?php if(!empty($sql_list[2])): ?>
                            <?php foreach ($sql_list[2] as $key => $row) :?>
                                <?php echo "<option>".$row."</option></br>" ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <br>
                    <!-- <script>

                        let select_time = document.getElementById("search_time");
                        let select_class = document.getElementById("search_class");
                        let select_location = document.getElementById("search_location");
                        select_time.selectedIndex = 1;
                        select_class.selectedIndex = 1;
                        select_location.selectedIndex = 1;
                    
                        </script> -->
                    <input type="submit"  name="submit" id="insert_btn" value="確認更改"  class="insert_btn">

            </div>
        </div>

    </div>
</body>
</html>