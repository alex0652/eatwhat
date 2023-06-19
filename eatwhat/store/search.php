<?php require_once '../config/db.php'; ?>


<?php
session_start();
$search_time="";
$search_class="";
$search_location="";
$search_text="";
if(isset($_POST["search_time"]))
    $search_time = $_POST["search_time"];
if(isset($_POST["search_class"]))
    $search_class = $_POST["search_class"];
if(isset($_POST["search_location"]))
    $search_location = $_POST["search_location"];
if(isset($_POST["search_text"]))
    $search_text = $_POST["search_text"];

$datas = array();

$sql_search = "SELECT * FROM `store` 
                WHERE `u_id` = ".$_SESSION["u_id"]."  
                AND `time` like '%$search_time%' 
                AND   `class` like '%$search_class%'
                AND   `location` like '%$search_location%'
                AND   `name` like '%$search_text%'";


$result = mysqli_query($link,$sql_search);
if ($result) {
    if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
    }
    $result->close();
}

?>
