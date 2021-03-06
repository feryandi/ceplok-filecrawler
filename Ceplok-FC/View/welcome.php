<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />

	<title>Nyeplok</title>
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
	<link rel = "stylesheet" href = "css/bootstrap-theme.min.css">
	<link rel = "stylesheet" href = "css/style.css">
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

	<div class="row" style="height: 5px; width:102%; position:fixed;">
		<div class="col-sm-12" style="height: 100%">
			<div id="loader" style="height: 100%; width:0%; background-color: white;"></div>
		</div>
	</div>	

	<div id="main" class="container" onclick="closeMenu()" style="position:relative; height: 100vh"> 

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
					<input id="query-textbox" name="query" type="text" value="What do you want to find?" class="form-control" >
				</div>
			</div>
			<div class="col-sm-12 col-md-2">
				<input type="submit" class="btn btn-primary btn-block" value="Find!"><span class="glyphicon glyphicon-search" style="margin-right: 10px"></span></button>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 text-center" style="color: #fff">2015 - Tim Nyeplok</div>
		</div>
	</div>
	</form>
	<div>
		<div class="col-sm-3"></div>
		<span id="counter" style="color:white;">Count: 0</span>
		<ul id="results" style="font-color: red">
		</ul>
	</div>

	<div id="result-list" style="padding-left: 15%;padding-right: 15%; min-height:100vh; display: none;">
		<div style="color: white; padding: 15px;"><h2>Here is your result...</h2></div>
		<div id="result-nothing">Oops.. We've found nothing</div>
	</div>

	<!--<div id="top-button" style="position:fixed; color:white; top:10px; right:10px" onclick="goTop()"><h4>AAAAA</h4></div>-->
</body>
</html>
