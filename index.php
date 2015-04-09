<html>
	<head>
		<title>Need some php here for Page Title</title>
		<meta name="description" content="Need some php here for the Description">
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="includes/css/bootstrap/normalize.css">
		<link rel="stylesheet" href="includes/css/bootstrap/slate.theme.bootstrap.min.css">
		<link rel="stylesheet" href="includes/css/my-styles.css">
	</head>	

	<body>

		<!-- START Header Code -->
		<div class="navbar navbar-default">
			<div class="container">
				<ul class="nav navbar-nav">
					<li><a href="#">Page Title</a></li>
					<li><a href="#">Page Title</a></li>
					<li><a href="#">Page Title</a></li>
					<li><a href="#">Page Title</a></li>
					<li><a href="#">Page Title</a></li>
				</ul>	
			</div>
		</div>	
		<!-- if statement for home page here -->
		<div id="home-page-header">
			<div class="container">
				<h1>GALAXY</h1>
				<p>Kristin's AWESOME php site!</p>
			</div>	
		</div>	
		<!-- end if -->
		<!-- END Header Code -->


		<!-- START Page Code -->
		<div id="page-content-area">
			<div class="container">
				<h2>Page Title</h2>
				This is where the page content will pull in...<br/>
				<?php echo 'Hello Derek, this is my index page.<br/>';?>
				Am I ready to start putting in some php now?
			</div>
		</div>
		<!-- END Page Code -->


		<!-- START Footer Code -->
		<div id="footer-area">
			<div class="container">
				Based on Bootstrap Theme - <a href="https://bootswatch.com/slate/">Slate</a>
			</div>	
		</div>	
		<!-- END Page Code -->


		<!-- Bootstrap core JavaScript
    	================================================== -->
    	<!-- Placed at the end of the document so the pages load faster -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    	<!-- Latest compiled and minified JavaScript -->
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	</body>	
</html>