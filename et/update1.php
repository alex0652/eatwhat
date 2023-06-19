<?php echo'<form method="post" action="update.php?id='.$_GET["id"].'">'  ?>
    
    <h3>更改店家資訊</h3>   
    店名<input type="text"  size="10" name="name" id="name" /><br/>
    營業時間 <input type="time" size="10" name="open_time" id="open_time" />
    ~ <input type="time" size="10" name="close_time" id="close_time" />
    <input type="submit"value="確認更改" />
    
<?php '</form>' ?>