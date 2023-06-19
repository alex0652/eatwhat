<?php
    require_once '../config/db.php';
?>

<?php
    session_start();
    $u_id = $_SESSION["u_id"];

    $name = $_POST["name"];
    $time = $_POST["time"];
    $class = $_POST["class"];
    $location = $_POST["location"];
    
    $sql = "INSERT INTO store (`s_id`,`u_id`, `name`, `open_time`, `close_time`)  
            VALUES ( NULL, $u_id , '".$name."', '".$_POST["open_time"]."', '".$_POST["close_time"]."')";  
    mysqli_query($link,$sql)    
        or die ("{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link)); 

    if (isset($_POST['submit'])) {
        $form_data_size = $_FILES['form_data']['size'];
        $form_data = $_FILES['form_data']['tmp_name'];
    }   
    $data = addslashes(file_get_contents($form_data));
    
    $sql_menu = "UPDATE store
                 SET bin_data = '$data' 
                 WHERE name = '$name'" ;
    mysqli_query($link, $sql_menu)
        or die ("{$sql_menu} 語法執行失敗，錯誤訊息: " . mysqli_error($link)); 

    $sql_tag = "UPDATE `store`
            SET `time` = '$time', 
                `class` = '$class', 
                `location` = '$location' 
            WHERE `name` = '$name'" ;
    mysqli_query($link, $sql_tag)
        or die ("{$sql_tag} 語法執行失敗，錯誤訊息: " . mysqli_error($link)); 

    if (mysqli_affected_rows($link)>0) {
        $new_id= mysqli_insert_id ($link);
        echo "新增成功";
    }
    elseif(mysqli_affected_rows($link)==0) {
        echo "無資料新增";
    }
    else {
        echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
    }
    header("location:index.php"); 
 ?>