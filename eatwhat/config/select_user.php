<?php require_once 'db.php'; ?>


<?php
    $datas = array();
    session_start();
    $sql = "SELECT * FROM `user`
                    WHERE `u_id` = ".$_SESSION["u_id"];
    $result = mysqli_query($link,$sql);
    if ($result) {
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $datas[] = $row;
            }
        }
        $result->close();
    }
    else {
        echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
    }


?>
