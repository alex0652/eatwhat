<?php

    $id = $_GET['id'];// $_GET['id']; 為簡潔,直接將id寫上了,正常應該是通過使用者填入的id獲取的
    $dsn = 'mysql:dbname=eat;host=localhost';
    $pdo = new PDO($dsn, 'root', '');
    $query = "SELECT `bin_data` FROM `store` WHERE s_id=".$id;
    $result = $pdo->query($query);
    $result = $result->fetchAll(2);
    $data = $result[0]['bin_data'];
    Header( "Content-type: jpg");
    echo $data;
?>
博牙以狗