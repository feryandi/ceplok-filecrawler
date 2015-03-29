<!DOCTYPE html>
<html lang="en">
<head>
	<title>search_</title>
	<!--<link rel = "stylesheet" href = "css/bootstrap.min.css">
	<link rel = "stylesheet" href = "css/bootstrap-theme.min.css">-->
	<link rel = "stylesheet" href = "css/global.css">
	<link rel = "stylesheet" href = "css/style.css">
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
				<input id="sdir" name="sdir" type="text" class="search-dir" value="C:/">
			</div>
		</div>
		<div class="option-menu">
			<div class="icon"></div>
			<div class="radio-holder"><input name="algo" type="radio" value="0" class="big-radio" checked> BFS</div>
			<div class="radio-holder"><input name="algo" type="radio" value="1" class="big-radio" > DFS</div>
		</div>
		<div class="ext-menu">
			<div class="text">
				Extensions:
			</div>
			<div class="click" onclick="toggleExt()"></div>
		</div>
		<div class="menu-menu">
			<div class="help" onclick="toggleShow('help')">Help</div>
			<div class="about" onclick="toggleShow('popup')">About</div>
		</div>

	</div>

	<div id="ext-holder" style="top: -15vh">
		<input name="ext-txt" type="checkbox" value="1" checked> .txt / text <br>
		<input name="ext-doc" type="checkbox" value="1" checked> .doc / .docx <br>
		<input name="ext-xls" type="checkbox" value="1" checked> .xls / .xlsx <br>
		<input name="ext-ppt" type="checkbox" value="1" checked> .ppt / .pptx 
	</div>

	<div class="backholder first">
		<div id="main" class="container"> 

			<div id="logo">
				<center class="text">search<span id="blink">_</span></center>
				<center class="subtext">It's that simple. Really?</center>
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

		<div id="open-result" onclick="toggleResult()"><</div>
	</div>

	</form>


	<!--<span id="counter" class="centered-text">Count: 0</span>-->

	<div id="result-slide" class="backholder result-page">
	
		<div id="result-list">
			<div class="title" >Here is your result...</div>
			<div class="icon" >search<span id="blink">_</span></div>
			<div id="result-nothing">Oops.. We've found nothing</div>
		</div>

		<div id="close-result" onclick="toggleResult()">></div>
	
	</div>

	<div class="backholder popup" id="popup" onclick="toggleHide('popup')" style="display: none">

		<div class="pop">
			<div class="title">ABOUT US</div>
			
			<div class="profile">
				<div class="pic"><img src="/img/profile-1.png"></div>
				<div class="desc">
					<center style="font-size: 1.3em">Adin Baskoro Pratomo</center>
					<center>135 13 058</center>
					<br>
					<center><img src="/img/github.png" style="width: 15%"></center>
					<center><a href="http://github.com/adinb" target="_blank">adinb</a></center>
				</div>
			</div>

			<div class="profile">
				<div class="pic"><img src="/img/profile-2.png"></div>
				<div class="desc">
					<center style="font-size: 1.3em">Aufar Gibran</center>
					<center>135 13 015</center>
					<br>
					<center><img src="/img/github.png" style="width: 15%"></center>
					<center><a href="http://github.com/kucingimbalance" target="_blank">kucingimbalance</a></center>
				</div>
			</div>

			<div class="profile">
				<div class="pic"><img src="/img/profile-3.png"></div>
				<div class="desc">
					<center style="font-size: 1.3em">Feryandi Nurdiantoro</center>
					<center>135 13 042</center>
					<br>
					<center><img src="/img/github.png" style="width: 15%"></center>
					<center><a href="http://github.com/feryandi" target="_blank">feryandi</a></center>
				</div>
			</div>
		</div>

	</div>


	<div class="backholder popup" id="help" onclick="toggleHide('help')" style="display: none">

		<div class="pop">
			<div class="title">NEED SOME HELP?</div>
			<br>
				<center>
					<video width="720" controls>
						<source src="/img/help.mp4" type="video/mp4">
						Your browser doesn't support HTML5 video.
						Luckily, our search_ is simple, you doesn't really need help!
					</video>
				</center>
			</div>
		</div>

	</div>


</body>
</html>
