<!DOCTYPE html>
<html>
<head>
	<title>Getränke System</title>
	<meta charset=utf-8>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.0.0/bootstrap-slider.js"></script>
	<script src="/js/patternLock.js"></script>
	<script src="/js/app.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.0.0/css/bootstrap-slider.css">
	<link rel="stylesheet" type="text/css" href="/css/patternLock.css">
	<style>
		body {
			font-family: 'Lato';
		}

		.fa-btn {
			margin-right: 6px;
		}
	</style>

</head>
<body>
	<div class="container">
		<div class="row w3-center">
			<div class="col-xs-2 w3-padding">
			</div>
			<div class="col-xs-8">
				<h1 style=" letter-spacing: 3px">Welcome to ISEA</h1>
				<h3 class="text-muted" style=" letter-spacing: 3px;" >We wish you a pleasant stay</h3>
			</div>
			<div class="col-xs-2">
				<img src="/Images/logo.png" class="img-responsive" style="padding-right:auto;padding-left:auto;" alt="ISEA LOGO">
			</div>
		</div>
	</div>	
	<div class="container">
		@yield('content')
	</div>
	<nav class="navbar navbar-fixed-bottom">
		<div class="container-fluid">

			<ul class="nav navbar-nav navbar-left">
				<li>Designed with <img src="/Images/like.png" height="20px"> & <img height="20px" src="/Images/coffee-cup.png"> by A. S.</li>
			</ul>
		</div>
	</nav>
</body>
</html>