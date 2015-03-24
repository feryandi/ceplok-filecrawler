<!DOCTYPE html>

<html lang="en">
<head>
	<title>Nyeplok</title>
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
	<link rel = "stylesheet" href = "css/bootstrap-theme.min.css">
	<link rel = "stylesheet" href = "css/style.css">
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery-2.1.3.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color:#2d2f45" >

	<!--Sidebar-->
	<form id="query-form">

		<div class="sidebar" id="menu" style="left: -240px; display: block;">

			<div class="blacken" style="float: left; height: 100%; width: 75%">
				<div class="row" style="margin-top: 20px; margin-bottom: 25px; margin-left: 10px">
					<div class="col-sm-12"><h1 style="color:white;">OPTION</h1></div>
				</div>
				<div class="row" style="margin-top: 10px; margin-right: 10px; margin-left: 10px;">
					<div class="col-sm-12" style="color:white;font-size:1.2em;margin-bottom:5px">
						Start Directory
					</div>
					<div class="col-sm-12" style="margin-bottom:20px">
						<input name="sdir" id="sdir" value="C:/" onfocus="this.value=''" class="form-control" type="text">	
					</div>
				</div>
				<div class="row" style=" margin-right: 10px; margin-left: 10px;">
					<div class="col-sm-12" style="color:white;font-size:1.2em;margin-bottom:5px">
						Algorithm
					</div>
				</div>
				<div class="row" style="margin-left: 10px">
					<div class="col-sm-12">
						<div class="switch">
							<input name="algo" id="cmn-toggle-algo" class="cmn-toggle cmn-toggle-round" value="0" type="checkbox">
							<label for="cmn-toggle-algo" id="algolabel" style="top:-1.4em;line-height:33px"></label>
						</div>
					</div>
				</div>
			</div>

			<div class="button-holder" >
				<div id="menu-button" onclick="toggleMenu()" class="blacken" > 
					<span id="button-icon" class="glyphicon glyphicon-chevron-right" style="color: #fff; padding: 35%;" aria-hidden="true"></span>	
				</div>
			</div>
		</div>
	

	<div id="main" class="container" onclick="closeMenu()" style="position:relative;"> 

		<!-- style="z-index:5" -->
		<!--Logo-->
		<div class="row" style="margin-top: 80px; margin-bottom: 60px">
			<div class="col-sm-12">
				<center><img src="img/logo.png" class="img-responsive"></center>
			</div>
		</div>
		<!--Search Bar + Button-->
		<div class="row" style="margin-bottom: 70px">			
			<div class="col-sm-12 col-md-10">
				<div class="form-group" width="100%">
					<input name="query" type="text" value="What do you want to find?" onfocus="this.value=''" class="form-control" >
				</div>
			</div>
			<div class="col-sm-12 col-md-2">
				<input type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-search" style="margin-right: 10px"></span>Find!</button>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 text-center" style="color: #fff">2015 - Tim Nyeplok</div>
		</div>
	</div>
	</form>
	<div>
		<div class="col-sm-3"></div>
		<span id="counter">Count: 0</span>
		<ul id="results" style="font-color: red">
		</ul>
	</div>
</body>
</html>
