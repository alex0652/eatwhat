<?php
    require_once '../config/db.php';
    session_start();
    $sql_type = ["time","class","location"];
    $sql_temp = ["", "", ""] ;
    $sql_list = ["", "", ""] ;
    $sql_data = ["", "", ""] ;
    $sql = [$sql0 = "", $sql1 = "", $sql2 = ""];
    $result = [$result0 = "", $result1 = "", $result2 = ""];

    for ($i = 0; $i < 3; $i++){
        $sql_data[$i] = array();
        $sql[$i] = "SELECT `$sql_type[$i]` FROM `user`
                WHERE `u_id` = ".$_SESSION["u_id"];
        $result[$i] = mysqli_query($link,$sql[$i]);
        if ($result[$i]) {
            if (mysqli_num_rows($result[$i])>0) {
                while ($row = mysqli_fetch_assoc($result[$i])) {
                $sql_data[$i] = $row;
                }
            }
            $result[$i]->close();
        }
        $sql_temp[$i] = $sql_data[$i];
        $sql_temp[$i] = $sql_temp[$i]["$sql_type[$i]"];
        $sql_list[$i] = preg_split('/,/',$sql_temp[$i]);
    }


    $datas = array();
    $sql = "SELECT * FROM `store`
                    WHERE u_id = ".$_SESSION["u_id"];
    $result = mysqli_query($link,$sql);
    if ($result) {
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $datas[] = $row;
            }
        }
    }
    else {
        echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
    }
    $num = count($datas);
    $rand = rand(0,$num-1);
    $temp = 0; 

?>

<body>

    時間
    <select name="search_time" id="search_time">
        <?php if(!empty($sql_list[0])): ?>
        <?php foreach ($sql_list[0] as $key => $row) :?>
        <?php echo "<option>".$row."</option></br>" ?>
        <?php endforeach; ?>
        <?php endif; ?>
    </select>

    種類
    <select name="search_class" id="search_class">
        <?php if(!empty($sql_list[1])): ?>
        <?php foreach ($sql_list[1] as $key => $row) :?>
        <?php echo "<option>".$row."</option></br>" ?>
        <?php endforeach; ?>
        <?php endif; ?>
    </select>

    地點
    <select name="search_location" id="search_location">
        <?php if(!empty($sql_list[2])): ?>
        <?php foreach ($sql_list[2] as $key => $row) :?>
        <?php echo "<option>".$row."</option></br>" ?>
        <?php endforeach; ?>
        <?php endif; ?>
    </select>
    </br>
    <div>
        <div id="res">抽取結果會顯示在此</div>
            <button type="button" onclick="extract();">抽取</button>
            <!-- 取得所有店家資料(名稱、時段、分類、地址) -->
            <?php
                    
                $result = mysqli_query($link,$sql);
                if ($result) {
                    if (mysqli_num_rows($result)>0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $datas_name[] = $row["name"];
                            $datas_time[] = $row["time"];
                            $datas_class[] = $row["class"];
                            $datas_location[] = $row["location"];
                        }
                    }
                    $result->close();
                    $str_name=json_encode($datas_name);
                    $str_time=json_encode($datas_time);
                    $str_class=json_encode($datas_class);
                    $str_location=json_encode($datas_location);
                }
            ?>
            <!-- 處理抽取動作 -->
            <script>
            // 初始化顯示div
            const res = document.getElementById("res");
            // 初始化店家資料
            let arr_name = <?php echo $str_name ?>;
            let arr_time = <?php echo $str_time ?>;
            let arr_class = <?php echo $str_class ?>;
            let arr_location = <?php echo $str_location ?>;
            // 初始化下拉式選單選擇項
            let select_time, select_class, select_location;
            // 初始化抽取陣列(0,1,2,...,arr_name.length-1)
            let extract_arr = Array.from(Array(arr_name.length).keys())
            // 按下抽取後執行的韓式(料理)
            function extract() {
                // 抽取亂數
                shuffle(extract_arr);
                // 按下抽取後取得下拉式清單選擇項
                select_time = document.getElementById("search_time").value;
                select_class = document.getElementById("search_class").value;
                select_location = document.getElementById("search_location").value;
                // 計數顯示個數(之後可改為顯示多個再break)
                let display_count = 0;
                // 走訪陣列(extract_arr的index)，若都符合條件則顯示並結束迴圈
                for (var x = 0; x < arr_name.length; x++) {
                    if (arr_time[extract_arr[x]] === select_time || select_time === "")
                        if (arr_class[extract_arr[x]] === select_class || select_class === "")
                            if (arr_location[extract_arr[x]] === select_location || select_location === "") {
                                res.innerHTML = arr_name[extract_arr[x]];
                                display_count++;
                                if (display_count == 1) break; // 這段雖然看起來很沒用，主要用在顯示多個的情況
                            }
                }
                // 處理如果篩選後都沒有的情況
                if (display_count == 0) res.innerHTML = "找不到你所選的餐廳欸¯\_(ツ)_/¯";

            }
            // JS機率較平均的隨機陣列(Source:https://shubo.io/javascript-random-shuffle/)
            function shuffle(array) {
                for (let i = array.length - 1; i > 0; i--) {
                    let j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]];
                }
            }
            </script>
    </div>
</body>