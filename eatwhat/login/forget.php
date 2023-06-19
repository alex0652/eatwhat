<?php
    include("../config/db.php");
    session_start();
    $email = $_POST["mail"];
    $account = $_POST["username"];
    $flag_mail = false;
    $flag_account = false;

    $sql_mail = "SELECT `email` FROM `user`";
    $temp_mail = mysqli_query($link,$sql_mail)
                    or die ("{$sql_mail} 語法執行失敗，錯誤訊息: " . mysqli_error($link)); 

    $sql_account = "SELECT `username` FROM `user`";
    $temp_account = mysqli_query($link, $sql_account)
                        or die ("{$sql_account} 語法執行失敗，錯誤訊息: " . mysqli_error($link));

    foreach ($temp_mail as $key => $row) :
        if ($row['email'] == $email)
            $flag_mail = true;
    endforeach; 

    foreach ($temp_account as $key => $row):
        if ($row['username'] == $account)
            $flag_account = true;
    endforeach;

    if ($flag_account && $flag_mail) {
        $sql_password = "SELECT `password` FROM `user` WHERE `username` = '$account'";
        $temp_password = mysqli_query($link, $sql_password)
            or die("{$sql_password} 語法執行失敗，錯誤訊息: " . mysqli_error($link));
        foreach ($temp_password as $key => $row):
            $_SESSION["password"] = $row['password']; 
            function_alert("密碼:".$_SESSION["password"]);
            header("Refresh:0.01;url=logout.php");
        endforeach;
    } 
    else{
        function_alert("信箱或帳號錯誤");
        header("Refresh:0.01;url=forget_page.php");
    }

    function function_alert($message) { 
        echo 
            "<script>
                alert('$message');
            </script>"; 
        return false;
    } 
?>



