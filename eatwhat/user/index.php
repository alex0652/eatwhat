<?php $conn = require_once "../config/db.php"; ?>
<?php $conn = require_once "../config/db.php"; ?>

<?php
    session_start();
    $time_str = "";
    $class_str = "";
    $location_str = "";
    $username_str = "";
    $password_str = "";
    $sql_type = ["time","class","location","username","password"];
    $sql_temp = ["", "", "", "", ""] ;
    $sql_list = ["", "", "", "", ""] ;
    $sql_data = ["", "", "", "", ""] ;
    $sql = [$sql0 = "", $sql1 = "", $sql2 = "", $sql3 = "", $sql4 = ""];
    $result = [$result0 = "", $result1 = "", $result2 = "", $result3 = "", $result4 = ""];

    for ($i = 0; $i < 5; $i++){
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
    if(!empty($sql_list[0])){
        foreach ($sql_list[0] as $key => $row) {
            if ($row != "") {
                $time_str = $time_str.$row."," ;
            }
        }   
    }

    if(!empty($sql_list[1])){
        foreach ($sql_list[1] as $key => $row) {
            if ($row != "") {
                $class_str = $class_str.$row."," ;
            }
        }
    }


    if(!empty($sql_list[2])){
        foreach ($sql_list[2] as $key => $row) {
            if ($row != "") {
                $location_str = $location_str . $row . ",";
            }
        }
            
    }
    
    if(!empty($sql_list[3])){
        foreach ($sql_list[3] as $key => $row) {
            if ($row != "") {
                $username_str = $username_str . $row ;
            }
        }
            
    } 
    if(!empty($sql_list[4])){
        foreach ($sql_list[4] as $key => $row) {
            if ($row != "") {
                $password_str = $password_str . $row ;
            }
        }
            
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
    <link rel="stylesheet" href="css/style_user.css">

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

        <div class="home d-flex">
            <div class="container">
                <div class="title" >個人資料</div>

                <form action="update.php" method = "POST">
                    <div class="name mt-4" name="search_time" id = "search_time">
                        帳號：
                        <input type = "text" name = "user" id = "user" size = "100"  class="textbox" value = "<?php echo $username_str ?>">
                    </div>    

                    <div class="name mt-4" name="search_time" id = "search_time">
                        密碼：
                        <input type = "password" name = "password" id = "password" size = "100"  class="textbox" value = "<?php echo $password_str ?>">
                    </div>

                    <div class="name mt-4" name="search_time" id = "search_time">
                        已有時間標籤：
                        <input type = "text" name = "test1" id = "test1" size = "100" value = "<?php echo $time_str ?>" class="textbox">
                    </div>

                    <div class="name mt-4" name="search_class" id = "search_class">
                        已有種類標籤：
                        <input type = "text" name = "test2" id = "test2" size = "100" value = "<?php echo $class_str ?>" class="textbox">
                    </div>

                    <div class="name mt-4" name="search_location" id = "search_location">
                        已有地點標籤：
                        <input type = "text" name = "test3" id = "test3" size = "100" value = "<?php echo $location_str ?>" class="textbox">
                    </div>

                    <input type="submit"  name="submit" id="insert_btn" value="新增" class="insert_btn mt-5 mb-2">
                </form>
                
                
            </div>
        </div>

    </div>
</body>
</html>