<!DOCTYPE html>
<!-- saved from url=(0065)https://dl.dropboxusercontent.com/u/91005861/Tubes%202/index.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Nyeplok</title>
	<link rel="stylesheet" href="https://dl.dropboxusercontent.com/s/75udghi68sblkbz/style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://dl.dropbox.com/s/mlms1hxbdu1ifcp/menu.js"></script>
	<meta charset="utf-8">
</head>
<body style="background-color:#2d2f45">

	<div class="sidebar" id="menu" style="left: -100%; display: block;">
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

	<div class="container">

		<div class="row" style="margin-top: 3%; position: relative; z-index:100;"> 
			<div class="col-sm-1"></div>
			<div class="col-sm-11">
				<button type="button" id="menu-button" onclick="toggleMenu()" class="btn btn-default btn-lg" style="background-color: #2d2f45; background-image: none; border-shadow:none; text-shadow:none;"> 
					<span id="button-icon" class="glyphicon glyphicon-plus-sign" style="color: #fff" aria-hidden="true"></span>	
				</button>
			</div>
		</div>

		<div class="row" style="margin-top: 3%; margin-bottom: 60px">
			<div class="col-sm-12">
				<center><img src="https://dl.dropbox.com/s/sc0nq4qgsz96lhi/logo.png"></center>
			</div>
		</div>
		
		<div class="row" style="margin-bottom: 70px">
			<div class="col-sm-3"></div>

			<div class="col-sm-6">
				<div class="form-group" width="70%">
					<form action="search.php" method="POST">
						<input type="text" name="query" value="What do you want to find?" onfocus="this.value=&#39;&#39;" onblur="this.value=&#39;What do you want to find?&#39;" class="form-control">
					</form>
				</div>
			</div>

			<div class="col-sm-3">
				<button class="btn btn-primary"><span class="glyphicon glyphicon-search" style="margin-right: 10px"></span>Find!</button>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 text-center" style="color: #fff">2015 - Tim Nyeplok</div>
		</div>
	</div>




</body></html>