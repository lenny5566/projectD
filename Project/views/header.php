<div data-role="header" data-position="fixed">
    <div data-role="navbar">
	<table>
            <tbody>
                <tr>
                	<td scope="col">
                    	<a href="/Project/Home/Index" data-icon="home" data-theme="b" data-ajax="false">
                    		<h3>Home</h3>
                    	</a>
                    </td>
                    <td scope="col">
                        <h3>骰一個</h3>
                        <a href="/Project/Rand/rand" data-icon="home" data-theme="b" data-ajax="false">
                            <img src="/Project/css/images/red-dice-icon.gif" width="200" height="200">
                        </a> 
                    </td>
                    
                    <?php if (!isset($_SESSION["userId"])) : ?>
                    <td scope="col">
                        <h3>登入</h3>
                       	<a href="/Project/Member/Login" data-icon="star" data-theme="b" data-ajax="false">
							<img src="/Project/css/images/write.gif" width="200" height="200">
						</a>
                    </td>
                    <?php else: ?>
                    <td scope="col">
                        <h3>行事曆</h3>
                        <a href="/Project/NewCalendar/drag.php" data-icon="gear" data-theme="b" data-ajax="false" target="_blank">
                            <img src="/Project/css/images/calendar.jpg" width="200" height="200">
                        </a> 
                    </td>
                    <td scope="col">
                    	<a href="/Project/Member/Logout" data-icon="star" data-theme="b" data-ajax="false">Logout</a>
                    </td>	
					<?php endif; ?>
                </tr>
            </tbody>
    </table>
    </div>
</div>