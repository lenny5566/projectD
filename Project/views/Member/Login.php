<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>
<?php require("views/script_css.php") ?>
</head>
<body>
	<h1 id="target" class="blue-text text-darken-2 animated rubberBand">
            吃飯行事曆
    </h1>
	<div id="labPage" data-role="page" data-theme="d">
		<div data-role="content">
			<form method="post" action="" data-ajax="false">
				<div data-role="fieldcontain">
					<label for="txtID">User ID:</label> <input type="text" name="txtID"
						id="txtID" value="<?= $data->userId ?>" placeholder="請輸入帳號" />
				</div>
				<div data-role="fieldcontain">
					<label for="txtPassword">Password:</label> <input type="password"
						name="txtPassword" id="txtPassword" value="<?= $data->password ?>" />
				</div>

				<div class="ui-grid-a">
					<div class="ui-block-a">
						<input type="submit" name="btnOK" value="OK" />
					</div>
					<div class="ui-block-b">
						<a href="index.php" data-role="button">Cancel</a>
					</div>
				</div>
				<div>
					<ul data-role="listview" data-inset="true">
						<li data-role="list-divider">測試資料</li>
						<li>User ID: derek</li>
						<li>password: jeter</li>
					</ul>
				</div>
			</form>
		</div>

	</div>
	<!-- page -->

</body>
</html>
