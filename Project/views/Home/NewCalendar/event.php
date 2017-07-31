<?php
    include_once("connect.php");
    $action = $_GET['action'];
    $id = (int)$_GET['id'];

    switch($action)
    {
    	case 'add':
    		addform();
    		break;
    	case 'edit':
    		editform($id);
    		break;
    }
    
    function addform()
    {
        $date = $_GET['date'];
        $enddate = $_GET['end'];
        if($date==$enddate) $enddate='';
        if(empty($enddate))
        {
	        $display = 'style="display:none"';
	        $enddate = $date;
	        $chk = '';
        }
        else
        {
        	$display = 'style=""';
        	$chk = 'checked';
        }
        
        $enddate = empty($_GET['end'])?$date:$_GET['end'];
?>
         <div>
                <?php include("script/box.php"); ?>
         </div>
<?php 

    }

    function editform($id)
    {
    	$query = mysql_query("select * from calendar where id='$id'");
    	$row = mysql_fetch_array($query);
    	if($row)
    	{
    		$id = $row['id'];
    		$title = $row['title'];
    		$starttime = $row['starttime'];
    		$start_d = date("Y-m-d",$starttime);
    		$start_h = date("H",$starttime);
    		$start_m = date("i",$starttime);
    		
    		$endtime = $row['endtime'];
    		if($endtime==0){
    			$end_d = $startdate;
    			$end_chk = '';
    			$end_display = "style='display:none'";
    		}else{
    			$end_d = date("Y-m-d",$endtime);
    			$end_h = date("H",$endtime);
    			$end_m = date("i",$endtime);
    			$end_chk = "checked";
    			$end_display = "style=''";
    		}
    		
    		$allday = $row['allday'];
    		if($allday==1){
    			$display = "style='display:none'";
    			$allday_chk = "checked";
    		}else{
    			$display = "style=''";
    			$allday_chk = '';
    		}
    	}
?>

        <div>
                <?php include("script/exisitBox.php"); ?>
        </div>
        
<?php }?>

<script type="text/javascript">
$(function()
{
	$(".datepicker").datepicker({minDate: -3,maxDate: 3});
	$("#isallday").click(function()
	{
		if($("#sel_start").css("display")=="none")
		{
			$("#sel_start,#sel_end").show();
		}
		else
		{
			$("#sel_start,#sel_end").hide();
		}
	});
	
	$("#isend").click(function()
	{
		if($("#p_endtime").css("display")=="none")
		{
			$("#p_endtime").show();
		}
		else
		{
			$("#p_endtime").hide();
		}
		$.fancybox.resize();//自動調整高度
	});
	
	//提交表單
	$('#add_form').ajaxForm(
	{
		beforeSubmit: showRequest, //表單驗證
        success: showResponse //回傳成功
    }); 
	
	//刪除事件
	$("#del_event").click(function()
	{
		if(confirm("確定刪除?"))
		{
			var eventid = $("#eventid").val();
			$.post("do.php?action=del",{id:eventid},function(msg)
			{
				if(msg==1)
				{//如果刪除成功
					$.fancybox.close();
					$('#calendar').fullCalendar('refetchEvents'); //重新取得所有物件數據
				}
				else
				{
					alert(msg);	
				}
			});
		}
	});
});

function showRequest()
{
	var events = $("#event").val();
	
	if(events=='')
	{
		alert("請輸入要吃的東西！");
		$("#event").focus();
		return false;
	}
}

function showResponse(responseText, statusText, xhr, $form)
{
	if(statusText=="success")
	{	
		if(responseText==1)
		{
			$.fancybox.close();
			$('#calendar').fullCalendar('refetchEvents'); ////重新取得所有物件數據
		}
		else
		{
			alert(responseText);
		}
	}
	else
	{
		alert(statusText);
	}
}

</script>