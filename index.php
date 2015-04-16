<?php
// Title of my site
$title = 'KD\'s PHP Site';

// My 1st way to try this...
// A class to create the variables needed for each page
 class Page {
	// An array of pages
	public $pages = array('home', 'about', 'contact', 'stuff', 'things');
	public $page = $_GET['page']; // This line seems to failing, why can't I get???
	public $activePage = $pages[$page];
	public $id;
	public $slug;
	public $title;
	public $description;



	// Find the active page
	public function whatPage($activePage) {
		// Not sure how to do this, but here are my thoughts...
		if (!isset($_GET['page'])) {
			$this->$activePage = $pages['home'];
			return $this->$activePage;
		}
		else {
			$this->$activePage = $pages[($_GET['page'])];
			return $this->$activePage;
		}
	}

}

// Instances of the pages

$home = new Page;
$home->id = 'home';
$home->slug = '/';
$home->title = 'Welcome to GALAXY';
$home->description = 'Home page';
$home->page = $home->id;
$home->whatPage($activePage);

$about = new Page;
$about->id = 'about';
$about->slug = '/about';
$about->title = 'About';
$about->description = 'About page';
$about->page = $about->id;
$about->whatPage($activePage);

$contact = new Page;
$contact->id = 'contact';
$contact->slug = '/contact';
$contact->title = 'Contact';
$contact->description = 'Contact page';
$contact->page = $contact->id;
$contact->whatPage($activePage);

$stuff = new Page;
$stuff->id = 'stuff';
$stuff->slug = '/stuff';
$stuff->title = 'Stuff';
$stuff->description = 'Stuff page';
$stuff->page = $stuff->id;
$stuff->whatPage($activePage);

$things = new Page;
$things->id = 'things';
$things->slug = '/things';
$things->title = 'Things';
$things->description = 'Things page';
$things->page = $things->id;
$things->whatPage($activePage);


// Once all of the above is figured out...
// Create page titles
//$pageTitle = $activePage->title.' - '.$title;
// Create page descriptions
//$pageDescription = $activePage->description;

?>

<html>
	<head>
		<title><?=html_entity_decode($pageTitle);?></title>
		<meta name="description" content="<?=$pageDescription;?>">
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
					<li><a href="/">Home</a></li>
					<li><a href="/about">About</a></li>
					<li><a href="/contact">Contact</a></li>
					<li><a href="/stuff">Stuff</a></li>
					<li><a href="/things">Things</a></li>
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
				<h2>Title here</h2>
				content here...
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