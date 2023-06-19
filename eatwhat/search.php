<?php require_once 'config/db.php'; ?>
<?php //require_once 'config/select_store.php'; ?>

<?php
    session_start();
    $post = "";
    if(isset($_POST["search_box"]))
        $post = $_POST["search_box"];
    $sql = "SELECT * FROM `store`
            WHERE `u_id` = ".$_SESSION["u_id"]."  AND  `name` like '%$post%'";
    // $sql = "SELECT * FROM `store`
    //         WHERE `name` like '%$post%'";
 

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
