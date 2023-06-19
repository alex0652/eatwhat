<?php
    $conn=require_once "../config/db.php";
    $username=$_POST["username"];
    $password=$_POST["password"];
    $password_hash=password_hash($password,PASSWORD_DEFAULT);


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "SELECT * FROM user WHERE username ='".$username."'";
        $result=mysqli_query($link,$sql);
        $sql_fetch = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)==1 && $password==$sql_fetch["password"]){           
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["u_id"] =  $sql_fetch["u_id"];
            $_SESSION["username"] = $_POST["username"];
            header("location:../index.php");

        }else{
            function_alert("帳號或密碼錯誤");
            header("Refresh:0.01;url=index.php");
        }
    }
    else{
        function_alert("Something wrong"); 
    }
    mysqli_close($link);

    function function_alert($message) { 
        echo 
            "<script>alert('$message');

            </script>"; 
        return false;
    } 
?>