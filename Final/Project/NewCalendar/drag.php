<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Calendar</title>
<link rel="stylesheet" type="text/css" href="css/fullcalendar.css">
<link rel="stylesheet" type="text/css" href="css/fancybox.css">
<link rel="stylesheet" type="text/css" href="css/calendar.css">

<script src='http://code.jquery.com/jquery-1.9.1.js'></script>
<script src='http://code.jquery.com/ui/1.10.3/jquery-ui.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script src='js/jquery.fancybox-1.3.1.pack.js'></script>
<script type="text/javascript">
$(function() 
{
	$('#calendar').fullCalendar(
	{
		header: 
		{ 
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		editable: true,
		dragOpacity: 
		{
			agenda: .5,
			''	  : .6,
		},
		eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) 
		{
			$.post("do.php?action=drag"
				    ,{id:event.id,daydiff:dayDelta,minudiff:minuteDelta,allday:allDay}
				    ,function(msg)
				    {
						if(msg!=1)
						{
							alert(msg);
							revertFunc();
						}
					 }
			);
    	},
		
		 eventResize: function(event,dayDelta,minuteDelta,revertFunc) 
		 {
			$.post("do.php?action=resize"
					,{id:event.id,daydiff:dayDelta,minudiff:minuteDelta}
					,function(msg)
					{
						if(msg!=1)
						{
							alert(msg);
							revertFunc();
						}
					}
			);
    	 },
		
		selectable: true,
		
		select: function( startDate, endDate, allDay, jsEvent, view )
		{
			var start = $.fullCalendar.formatDate(startDate,'yyyy-MM-dd');
			var end   = $.fullCalendar.formatDate(endDate,'yyyy-MM-dd');
			
			$.fancybox(
				{
					'type':'ajax',
					'href':'event.php?action=add&date='+start+'&end='+end,
				}
			);
		},
		
		events: 'json.php',
		
		dayClick: function(date, allDay, jsEvent, view)
		{
			var selDate = $.fullCalendar.formatDate(date,'yyyy-MM-dd');
			$.fancybox(
				{
					'type':'ajax',
					'href':'event.php?action=add&date='+selDate,
				}
			);
    	},
    	
		eventClick: function(calEvent, jsEvent, view)
		{
			$.fancybox(
				{
					'type':'ajax',
					'href':'event.php?action=edit&id='+calEvent.id,
				}
			);
		}
	});
	
});
</script>
</head>

<body>
	<div id="header">
	   <div id="logo">
	   		<h1>
	   			<a href="http://www.google.com" title="返回首頁">hello</a>
	   		</h1>
	   </div>
	  
	</div>
	
	<div id="main" style="width:1060px">
		<h2 class="top_title">
	   		<a href="http://www.google.com">Calendar</a>
		</h2>
	   	
	   	<div id='calendar'></div>
	   
   	<br/>
	</div>
	<div id="footer">
    	<p>Welcome Frinends!</p>
	</div>
	
</body>
</html>
