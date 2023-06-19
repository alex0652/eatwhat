<?php $conn = require_once "db.php"; ?>
<?php require_once 'select.php'; ?>

<div>
    <!-- 新增 -->
    <form method="post" action="insert.php" action = "test2.php" enctype="multipart/form-data"> 
        <h3>新增店家</h3>   
        店名<input type="text"  size="10" name="name" id="name" /><br/>
        營業時間 <input type="time" size="10" name="open_time" id="open_time" />
        ~ <input type="time" size="10" name="close_time" id="close_time" />
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> <br>
        上傳圖片:
        <input type="file" name="form_data" size="40"><br>
        <input type="submit"  name="submit" id="insert_btn" value="新增" />
        
    </form>

    <!-- 新增 -->   

    <!-- 表格 -->
    <?php
        echo 
            "<h3>已有的店家</h3> 
            <table width='300' height='120' border='1'>
            <tr>
                <td heigth='120'>店名</td>
                <td>營業時間</td>
                <td>菜單</td>
                <td>修改</td>
            </tr>";
    ?>
    <!-- 表格 -->

    <!-- 已有 -->
    <form action="delete.php" method="post">
        <?php if(!empty($datas)): ?>
            <?php foreach ($datas as $key => $row) :?>
                <tr>
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <?php echo $row['open_time'];?>
                        <?php echo $row['close_time'];  ?>
                    </td><td>
                        <a href="show_menu.php?id=<?php echo $row["id"]; ?>">菜單</a>
                    </td><td>
                        <a href="delete.php?id=<?php echo $row["id"]; ?>">刪除</a>
                        <a href="update1.php?id=<?php echo $row["id"]; ?>">更改</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else:  ?>
        查無資料
        <?php endif; ?>
    <!-- 已有 -->

    </form>
</div>


<script src="js/js.js"></script>