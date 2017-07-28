	<a href="/Project/Home/Index" style="text-decoration:none;">
		<h1 id="target" class="blue-text text-darken-2 animated rubberBand">
            吃飯行事曆
    	</h1>
   	</a>
	<table>
            <tbody>
                <tr>
                    <td scope="col">
                        <h3>骰一個</h3>
                        <a href="/Project/Rand/rand">
                            <img src="/Project/css/images/dice.png" width="200" height="200">
                        </a> 
                    </td>
                    
                    <?php if (!isset($_SESSION["userId"])) : ?>
                    <td scope="col">
                        <h3>登入</h3>
                       	<a href="/Project/Member/Login">
							<img src="/Project/css/images/Login.png" width="200" height="200">
						</a>
                    </td>
                    <?php else: ?>
                    <td scope="col">
                        <h3>行事曆</h3>
                        <a href="/Project/NewCalendar/drag.php">
                            <img src="/Project/css/images/Schedule.png" width="200" height="200">
                        </a> 
                    </td>
                    <td scope="col">
                        <h3>登出</h3>
                    	<a href="/Project/Member/Logout">
                    	    <img src="/Project/css/images/logout.png" width="200" height="200">
                    	</a>
                    </td>	
					<?php endif; ?>
                </tr>
            </tbody>
    </table>
