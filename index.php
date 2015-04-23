<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// My 2st way to try this after reviewing with D...
// A class to create the variables needed for each page
 class Page {
	public $id;
	public $slug;
	public $title;
	public $description;
	public $template;

	/*public function test() {
        var_dump(get_object_vars($this));
    }*/
}

// Instances of Page
$home = new Page;
$home->id = 'home';
$home->slug = 'home';
$home->title = 'Welcome to GALAXY';
$home->description = 'Home page';
$home->template = 'home.php';

//var_dump(get_object_vars($home));
//echo "<br/>";

$about = new Page;
$about->id = 'about';
$about->slug = 'about';
$about->title = 'About';
$about->description = 'About page';
$about->template = 'about.php';

//var_dump(get_object_vars($about));
//echo "<br/>";

$contact = new Page;
$contact->id = 'contact';
$contact->slug = 'contact';
$contact->title = 'Contact';
$contact->description = 'Contact page';
$contact->template = 'contact.php';

//var_dump(get_object_vars($contact));
//echo "<br/>";

$stuff = new Page;
$stuff->id = 'stuff';
$stuff->slug = 'stuff';
$stuff->title = 'Stuff';
$stuff->description = 'Stuff page';
$stuff->template = 'stuff.php';

//var_dump(get_object_vars($stuff));
//echo "<br/>";

$things = new Page;
$things->id = 'things';
$things->slug = 'things';
$things->title = 'Things';
$things->description = 'Things page';
$things->template = 'things.php';

//var_dump(get_object_vars($things));
//echo "<br/>";


// ----------------------------------------------
// I get & understand all of the above that has 
// to do with the Page class and instances.
// ----------------------------------------------
// I start getting confused with the stuff below
// that has to do with the Pages class...
// ----------------------------------------------
// I made note on each line to try and make sense
// of what everything was doing...
// but I still need a refrsher to connect the
// dots once again.
// ----------------------------------------------


// A class to get and find the active page
class Pages {
	//Private var for all pages bc we don't want anything other than this class to use it
	private $all_pages; // I don't get where this var is ever assigned a value(s)
	//Function to get the page by slug (used in the current Page variable below)
	public function getPageBySlug($slug) { //run function by slug var to get the page
		if ($this->all_pages) {  //if all_pages variable exists
			foreach ($this->all_pages as $p) { // then for each all_pages variable now reference it as p variable
				if ($this->slug == $slug) { // if the slug for a page is equal to the currentPage slug 
					return $p; // then return the page
				}
				return $this->all_pages[0]; // otherwise return the index 0/home page
			}
		}
		return false; // otherwise return false
	}
	//Function to add page (used in the Pages instances below)
	public function addPage($page) { // run function by page var to add a page to the site
		$this->all_pages[] = $page; // the all_pages array item is equal to the page variable
	}
	//Function to get page (don't see where this is used though)
	public function getPages() { //run function to get the page
		return $this->all_pages; // return the pages
	}
	
}

//Instances of the pages class to add pages to the site
$pages = new Pages;
$pages->addPage($home);
$pages->addPage($about);
$pages->addPage($contact);
$pages->addPage($stuff);
$pages->addPage($things);
//var_dump($pages);


//Get Slug of current page
function getPageSlug() {
	$pageSlug = '';
	if (isset($_GET['page']) && ! empty($_GET['page'])) {
		$pageSlug = $_GET['page'];
	}
	return $pageSlug;
}

$slug = getPageSlug();
//var_dump($slug)

//Current page based on slug
//$currentPage = $pages->getPageBySlug($slug); // Notice undefined property, line 91...
//var_dump($currentPage)

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
					<li><a href="">Home</a></li>
					<li><a href="">About</a></li>
					<li><a href="">Contact</a></li>
					<li><a href="">Stuff</a></li>
					<li><a href="">Things</a></li>
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