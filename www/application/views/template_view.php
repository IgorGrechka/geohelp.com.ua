<!DOCTYPE html PUBLIC "//-W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Geohelp</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" href="../../css/main.css" type="text/css"/>
	<script type="text/javascript" src="../../js/fx.js"></script>
	<script type="text/javascript" src="../../js/jquery-1.11.1.js" ></script>
</head>
<body onLoad="fx()">
	<div id="content">
		<div id="header">
			<h1>geohelp.com.ua</h1>
		</div>
			<div id="left">
				<h2>Меню</h2>
				<ul>
					<li>
						<a href="/">Главная</a>
					</li>
					<li>
						<a href="/uslznaki">Условные знаки</a>
					</li>
				</ul>
				<?isset($user)? include "application/views/user_panel_view.php": include "application/views/auth_view.php";?>
			</div>
			<div id="right">
				<br />
				<span id="liveDate"></span>
				<br />
				<span id="liveTime"></span>
			</div>
			<div id="center">
				<? include "application/views/".$content_view; ?>
			</div>
			<div class="clear"></div>
		<div id="footer">
			<p>Все права защищены &copy; 2014</p>
		</div>
	</div>
</body>
</html>