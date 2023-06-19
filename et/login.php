<?php
    $conn=require_once "db.php";
    $username=$_POST["username"];
    $password=$_POST["password"];
    $password_hash=password_hash($password,PASSWORD_DEFAULT);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "SELECT * FROM `user` WHERE `username` ='".$username."'";
        $result=mysqli_query($link,$sql);
        if(mysqli_num_rows($result)==1 && $password==mysqli_fetch_assoc($result)["password"]){
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = mysqli_fetch_assoc($result)["id"];
            $_SESSION["username"] = mysqli_fetch_assoc($result)["username"];
            header("location:welcome.php");
        }else{
                function_alert("帳號或密碼錯誤"); 
            }
    }
        else{
            function_alert("Something wrong"); 
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