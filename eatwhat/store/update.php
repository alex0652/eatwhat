<?php require_once '../config/db.php';?>

<?php
    var_dump($_POST);

    $sql = "UPDATE `store`
            SET `name` = '".$_POST["name"]."', 
                `open_time` = '".$_POST["open_time"]."', 
                `close_time` = '".$_POST["close_time"]."',
                `time` = '".$_POST["time"]."',
                `class` = '".$_POST["class"]."',
                `location` = '".$_POST["location"]."'
            WHERE `s_id` = ".$_GET["id"];

    
    if (isset($_POST['submit'])) {
        $form_data = $_FILES['form_data']['tmp_name'];
        if (!empty($form_data)) {
            $data = addslashes(file_get_contents($form_data));
            // 圖檔
            $result = "UPDATE `store`
                        SET `bin_data` = '$data',
                        WHERE `s_id` = ".$_GET["id"];
        }
    }
    

    $result = mysqli_query($link,$sql);
    
    if (mysqli_affected_rows($link)>0) {
        echo "資料已更新";
        header("location:index.php");
    }
    elseif(mysqli_affected_rows($link)==0) {
        echo "請輸入更新資料";
        header("location:index.php");
    }
    else {
        echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
    }
   
 ?>