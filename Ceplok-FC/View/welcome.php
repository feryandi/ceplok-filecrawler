<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />

<head>
	<title>search_</title>
	<!--<link rel = "stylesheet" href = "css/bootstrap.min.css">
	<link rel = "stylesheet" href = "css/bootstrap-theme.min.css">-->
	<link rel = "stylesheet" href = "css/global.css">
	<link rel = "stylesheet" href = "css/style.css">
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery-2.1.3.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<!--Sidebar-->
	<form id="query-form">

	<div class="topbar">

		<div class="dir-menu">
			<div class="icon"></div>
			<div class="bar">
				<input name="sdir" type="text" placeholder="C:/" class="search-dir" >
			</div>
		</div>
		<div class="option-menu">
			<div class="radio-holder"><input name="algo" type="radio" value="0" class="big-radio" checked> BFS</div>
			<div class="radio-holder"><input name="algo" type="radio" value="1" class="big-radio" > DFS</div>
		</div>
		<div class="ext-menu">
			Extensions:
		</div>
		<div class="menu-menu">
			<div class="help">Help</div>
			<div class="about">About</div>
		</div>

	</div>

	<div class="backholder first">
		<div id="main" class="container"> 

			<div id="logo">
				<center class="text">search<span id="blink">_</span></center>
				<center class="subtext">It's that simple. Really.</center>
			</div>

			<div id="search">			
				<div class="bar">
					<input id="query-textbox" name="query" type="text" placeholder="What do you want to find?" class="search-input" >
					<div id="loader"></div>
				</div>	
				<div class="btn">
					<input type="submit" class="search-btn" value="Find!"></button>
				</div>	
			</div>

			<div id="copyright">2015</div>
		</div>
	</div>

	</form>


	<!--<span id="counter" class="centered-text">Count: 0</span>-->

	<div id="result-slide" class="backholder result-page">
	
		<div id="result-list">
			<div class="title" >Here is your result...</div>
			<div class="icon" >search<span id="blink">_</span></div>
			<div id="result-nothing">Oops.. We've found nothing</div>
		</div>

		<div id="close-result" onclick="toggleResult()"></div>
	
	</div>

</body>
</html>