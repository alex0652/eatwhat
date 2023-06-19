<?php require_once '../config/db.php'; ?>

<?php
    $datas_name = array();
    $datas_day = array();
    session_start();
    $sql_name = "SELECT * FROM `date`";
                  
    $result = mysqli_query($link,$sql_name);
    if ($result) {
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $datas_name[] = $row["name"];
                $datas_day[] = $row["date"];
            }
        }
        $result->close();
  $str_name=json_encode($datas_name);
  $str_day=json_encode($datas_day);
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
    <link rel="stylesheet" href="css/style_time.css">

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

        <div class="home d-flex flex-column align-items-center">
            <div class="container">
                <span>
                    <span class="text"><b id="name-diff"></b></span>
                    <span class="text_day"><b id="date-diff"></b></span>
                    <span class="text"><b id="text-diff"></b></span>

                    <script type="text/javascript">

                        let arr1 = <?php echo $str_name ?>;
                        let arr2 = <?php echo $str_day ?>;
                        let i = 0;
                        let date1 = new Date();
                        let date2 = new Date(arr2[0]);
                        let diffTime = date2 - date1;
                        let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                        console.log(arr1);
                        console.log(diffDays);
                        while(diffDays <=0 ){
                            if(diffDays == 0){
                                document.getElementById('name-diff').innerHTML = "今天是" + arr1[i] + "哦 :)";
                                document.getElementById('date-diff').innerHTML = "";
                                break;
                            }
                            else{
                                i++;
                                date2 = new Date(arr2[i]);
                                diffTime = date2 - date1;
                                diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                                document.getElementById('name-diff').innerHTML = "距離" + arr1[i] + "還有";
                                document.getElementById('date-diff').innerHTML = diffDays;
                                document.getElementById('text-diff').innerHTML = "天";
                            }
                        }  
                        if(diffDays > 0){
                            document.getElementById('name-diff').innerHTML = "距離" + arr1[i] + "還有";
                            document.getElementById('date-diff').innerHTML = diffDays;
                            document.getElementById('text-diff').innerHTML = "天";
                        }
                    </script>
                </span>
            </div>
        </div>
        

    </div>
</body>
</html>