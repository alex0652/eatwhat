<?php
require_once("../config/db.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $email = $_POST["email"];
    $time = ",早餐,早午餐,午餐,下午茶,晚餐,消夜";
    $class = ",台式料理,韓式料理,日式料理,泰式料理,美式料理,義式料理,";
    $location = ",中區,東區,南區,西區,北區,北屯區,南屯區,烏日區,";
    $check="SELECT * FROM user WHERE `username`='".$username."'";
    if(mysqli_num_rows(mysqli_query($link,$check))==0){
        $sql="INSERT INTO user (`u_id`, `email`, `username`, `password`, `time`, `class`, `location`)
                    VALUES(NULL, '".$email."', '".$username."', '".$password."', '".$time."', '".$class."', '".$location."')";
        
        if(mysqli_query($link, $sql)){
            echo "註冊成功!3秒後將自動跳轉頁面<br>";
            echo "<a href='index.php'>未成功跳轉頁面請點擊此</a>";
            header("refresh:3;url=index.php");
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($link);
        }
    }
    else{
        echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
        echo "<a href='register_page.php'>未成功跳轉頁面請點擊此</a>";
        header("refresh:3;url=index.php");
        exit;
    }
}


mysqli_close($link);

function function_alert($message) { 
    echo 
        "<script>alert('$message');
            window.location.href='index.php';
        </script>"; 
    
    return false;
} 
?>