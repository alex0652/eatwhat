<?php require_once 'db.php'; ?>

<?php
    $sql = "DELETE FROM `store` WHERE `id` = ".$_GET["id"];
    $result = mysqli_query($link,$sql);

    if (mysqli_affected_rows($link)>0) {
    echo "資料已刪除";
    }
    elseif(mysqli_affected_rows($link)==0) {
        echo "無資料刪除";
    }
    else {
        echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
    }
    header("location:final.php");
?>