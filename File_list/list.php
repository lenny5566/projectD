<!DOCTYPE html>
<html>
<head>
<?php require("script_css.php") ?>
<script type="text/javascript" src="jquery-1.11.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function load_list()
    {   
        $.ajax({
                url: 'data.php',
                cache: false,
                dataType: 'html',
                type: 'post',
                data: {
                	select_1: 1,
                	select_2: 1
                 },
                success: function(response)
                {
                    $('#msg').html(response);
                    $('#msg').fadeIn();
                }
            });

        $('#select_1, #select_2').click(function ()
        {
            $.ajax({
                url: 'data.php',
                cache: false,
                dataType: 'html',
                type: 'post',
                data: {
                	select_1: $("#select_1").find(":selected").val(),
                	select_2: $("#select_2").find(":selected").val()
                 },
                success: function(response)
                {
                    $('#msg').html(response);
                    $('#msg').fadeIn();
                }
            });
        });
    });
</script>
</head>
<body onload="load_list()">
    <br><br><br><br><br>
    <div id="enter">
        <form action="add.php" method="post" enctype="multipart/form-data">
        輸入資料 <input type="file" name="file" id="file" size="20" class="ifile"
        onchange="this.form.upfile.value = this.value.substr(this.value.lastIndexOf('\\')+1);">
            <input type="text" name="upfile" size="20" readonly>
            <input type="button" value="瀏覽..." onclick="this.form.file.click();">
    </div>
    <br><br>
    <div id="choose">
        排序
        <select id="select_1">
            <option value="press">出版社</option>
            <option value="name">書名</option>
            <option value="author">作者</option>
            <option value="prize">定價</option>
            <option value="day">發行日</option>
        </select>
        方向
        <select id="select_2">
            <option value="1" selected>ASC</option>
            <option value="2">DESC</option>
        </select>
    </div>
    <br><br>
    <div id="msg"></div>
    <br>
    <div style="text-align:center;">
        <input type="Submit" name="Submit" value="ADD">
        </form>
        <button>
            <a href="">匯出</a>
        </button>
    </div>
</body>
</html>
