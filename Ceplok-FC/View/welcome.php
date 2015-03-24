<!DOCTYPE html>
<!-- saved from url=(0065)https://dl.dropboxusercontent.com/u/91005861/Tubes%202/index.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Nyeplok</title>
	<link rel="stylesheet" href="css/style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">

	<!-- Latest prodcution jQuery -->
	<script type="text/javascript" src="js/jquery-2.1.3.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<!-- Our scripts -->
	<script type="text/javascript" src="js/main.js"></script>

	<meta charset="utf-8">
</head>
<body style="background-color:#2d2f45">

	<div class="sidebar" id="menu" style="left: 0%; display: block;">
		<div class="blacken" style="float: left; height: 100%; width: 75%">
			<div class="row" style="margin-top: 20px; margin-bottom: 25px;">
				<div class="col-sm-2" ></div>
				<div class="col-sm-2" ><h1 style="color:white;">OPTION</h1></div>
			</div>
			<div class="row" style="margin-top: 10px;">
				<div class="col-sm-2" ></div>
				<div class="col-sm-8" >
					<h4 style="color:white;">Start Directory</h4>
					<input type="text" name="keyword" value="C:/" onfocus="this.value=&#39;&#39;" class="form-control">	
				</div>
			</div>
			<div class="row" style="margin-top: 10px;">
				<div class="col-sm-2" ></div>
				<div class="col-sm-8" >
					<h4 style="color:white;">Algorithm</h4>
					<div class="btn-group" role="group" aria-label="...">
					  <button type="button" style="background-image: none; border-shadow:none; text-shadow:none;" class="btn btn-default active">DFS</button>
					  <button type="button" style="background-image: none; border-shadow:none; text-shadow:none;" class="btn btn-default">BFS</button>
					</div>
				</div>
			</div>
		</div>
		<div class="button-holder">
			<div id="menu-button" onclick="toggleMenu()" class="blacken" > 
				<span id="button-icon" class="glyphicon glyphicon-plus-sign" style="color: #fff; padding: 35%;" aria-hidden="true"></span>	
			</div>
		</div>
	</div>

	<div class="container">

		<div class="row" style="margin-top: 3%; margin-bottom: 60px">
			<div class="col-sm-12">
				<center><img src="https://dl.dropbox.com/s/sc0nq4qgsz96lhi/logo.png"></center>
			</div>
		</div>
		
		<div class="row" style="margin-bottom: 70px">
			<div class="col-sm-3"></div>

			<div class="col-sm-6">
				<div class="form-group" width="70%">
					<form id="query-form" method="POST">
						<input id="query" type="text" name="query" value="What do you want to find?" onfocus="this.value=&#39;&#39;" onblur="this.value=&#39;What do you want to find?&#39;" class="form-control">
						<input class="btn btn-primary" type="submit" value="Search (beneran)">
					</form>
				</div>
			</div>

			<div class="col-sm-3">
				<ul id="results">
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 text-center" style="color: #fff">2015 - Tim Nyeplok</div>
		</div>
	</div>



</body></html>