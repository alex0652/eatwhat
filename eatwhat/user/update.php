<?php require_once '../config/db.php';?>

<?php
    // var_dump($_POST);
    session_start();
    $sql = "UPDATE `user`
            SET `time` = '".$_POST["test1"]."', 
                `class` = '".$_POST["test2"]."', 
                `location` = '".$_POST["test3"]."',
                `username` = '".$_POST["user"]."', 
                `password` = '".$_POST["password"]."'
            WHERE `u_id` = ".$_SESSION["u_id"];

    $result = mysqli_query($link,$sql);
    header("location:index.php");
    
   
?>