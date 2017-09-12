<!DOCTYPE html>
<html>
<head>
<?php require("script_css.php") ?>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function load_list()
    {   
        $.ajax({
                url: 'data.php',
                cache: false,
                dataType: 'html',
                type: 'post',
                data: {
                	index : 1
                 },
                success: function(response)
                {
                    $('#msg').html(response);
                    $('#msg').fadeIn();
                }
            });

        $('#select_1').change(function ()
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
        
        $('#select_2').change(function ()
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
	
	function disp_confirm()
	{
		if (confirm("Sure delete?") ) {
			document.write("You pressed OK!")
		} else {
			document.write("You pressed Cancel!")
		}
	}
</script>
</head>
<body onload="load_list()">
    <br><br><br><br><br>
    <div style="text-align:center;">
		資料匯出
		<button>
            <a href="book.txt" download>匯出</a>
        </button>
	</div>
    <div id="choose">
        排序
        <select id="select_1">
            <option value="press" selected>出版社</option>
            <option value="name">書名</option>
            <option value="author">作者</option>
            <option value="prize">定價</option>
            <option value="day">發行日</option>
        </select>
        方向
        <select id="select_2">
            <option value="0" selected>ASC</option>
            <option value="1">DESC</option>
        </select>
    </div>
    <br><br>
    <div id="msg"></div>
    <br>
    <div style="text-align:center;">
        <button>
            <a href="add_list.php">ADD</a>
        </button>
        <input type="button" onclick="disp_confirm()" value="DEL" />
    </div>
</body>
</html>
