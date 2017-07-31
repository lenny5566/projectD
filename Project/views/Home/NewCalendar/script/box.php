        <div class="fancy">
        	<h3>想吃甚麼呢?</h3>
            <form id="add_form" action="do.php?action=add" method="post">
                
                <p>吃啥：
                    <input type="text" class="input" name="event" id="event" style="width:320px" placeholder="來份大碗的...">
                </p>
                <p>幾點：
                    <input type="text" class="input datepicker" name="startdate" id="startdate" value="<?php echo $date;?>" readonly>
                    <span id="sel_start" style="display:none"><select name="s_hour">
                    
                    	<option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08" selected>08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>:
                    <select name="s_minute">
                    	<option value="00" selected>00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                    </span>
                </p>
           
                <p id="p_endtime" <?php echo $display;?>>結束時間：
                    <input type="text" class="input datepicker" name="enddate" id="enddate" value="<?php echo $enddate;?>" readonly>
                        <span id="sel_end" style="display:none">
                            <select name="e_hour">
                                	<option value="00">00</option>
                                	<option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12" selected>12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                            </select>:
                            <select name="e_minute">
                                	<option value="00" selected>00</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                            </select>
                        </span>
                </p>
                
                <p>
                    <label><input type="checkbox" value="1" id="isallday" name="isallday" checked> 一整天</label>
                    <label><input type="checkbox" value="1" id="isend" name="isend" <?php echo $chk;?>> 結束時間</label>
                </p>
                
                <div class="sub_btn">
                    <input type="submit" class="btn btn_ok" value="確定">
                    <input type="button" class="btn btn_cancel" value="取消" onClick="$.fancybox.close()">
                </div>
                
            </form>
        </div>