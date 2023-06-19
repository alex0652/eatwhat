<?php
    require_once 'db.php';
?>

<?php
    // 基本資料

    $sql = "INSERT INTO `store` (`id`, `name`, `open_time`, `close_time`)  
            VALUES ( NULL ,'".$_POST["name"]."', '".$_POST["open_time"]."', '".$_POST["close_time"]."')";
   if (isset($_POST['submit'])) {
        $form_data_name = $_FILES['form_data']['name'];
        $form_data_size = $_FILES['form_data']['size'];
        $form_data_type = $_FILES['form_data']['type'];
        $form_data = $_FILES['form_data']['tmp_name'];
    }

    mysqli_query($link,$sql)    
        or die ("{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link)); 

    $dsn = 'mysql:dbname=eat;host=localhost';
    $pdo = new PDO($dsn, 'root', '');
    $data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
    // 圖檔
    echo $_POST["name"];
    $result = $pdo->query("UPDATE `store`
                            SET `bin_data` = '$data', 
                                `filename` = '$form_data_name', 
                                `filesize` = '$form_data_size', 
                                `filetype` = '$form_data_type'
                            WHERE `name` = '" .$_POST["name"]."'");

    
    if (mysqli_affected_rows($link)>0) {
        $new_id= mysqli_insert_id ($link);
        echo "新增後的id為 {$new_id} ";
    }
    elseif(mysqli_affected_rows($link)==0) {
        echo "無資料新增";
    }
    else {
        echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
    }
    header("location:final.php"); 
 ?>