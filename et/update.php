<?php require_once 'db.php';?>

<?php
    var_dump($_POST);

    $sql = "UPDATE `store`
            SET `name` = '".$_POST["name"]."', 
                `open_time` = '".$_POST["open_time"]."', 
                `close_time` = '".$_POST["close_time"]."' 
            WHERE `id` = ".$_GET["id"];

    $result = mysqli_query($link,$sql);
    
    if (mysqli_affected_rows($link)>0) {
        echo "資料已更新";
        header("location:final.php");
    }
    elseif(mysqli_affected_rows($link)==0) {
        echo "請輸入更新資料";
    }
    else {
        echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
    }
   
 ?>