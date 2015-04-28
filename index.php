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
// refresher with Derek helped :)
// ----------------------------------------------


// A class to get and find the active page
class Pages {
	//Private var for all pages bc we don't want anything other than this class to use it
	private $all_pages = array(); // Declaring this variable as private array, so only this class can use it.
	//Function to get the page by slug (used in the current Page variable below)
	public function getPageBySlug($slug) { //run function by slug var to get the page
		//var_dump($slug); // This tests the slug variable.
		//var_dump($this->all_pages); // This tests array variable.
		//die();
		if ($this->all_pages) {  //if all_pages array exists
			foreach ($this->all_pages as $p) { // then for each item in the all_pages array now reference it as p variable
				//var_dump($p->slug, $slug); // Test that it is finding the proper page slug we are after
				if ($p->slug == $slug) { // if the slug for a page is equal to any page slug 
					return $p; // then return the page
				}
			}
			return $this->all_pages[0]; // otherwise return the index 0/home page
		}
		return false; // otherwise return false
	}
	//Function to add page (used in the Pages instances below)
	public function addPage($page) { // run function by page var to add a page to the site
		$this->all_pages[] = $page; // adding the page in the function argument to the all_pages array
		//array_push($this->all_pages, $page); // longer version of the above line
	}
	//Function to get pages that were added into the all_pages array (is this used somewhere I am missing)
	public function getPages() { //run function to get the pages
		return $this->all_pages; // return the array of pages
	}
	
}

//Instances of the pages class to add pages to the site
$siteMap = new Pages;
$siteMap->addPage($home);
$siteMap->addPage($about);
$siteMap->addPage($contact);
$siteMap->addPage($stuff);
$siteMap->addPage($things);
//var_dump($siteMap->getPages());
//var_dump($siteMap->getPageBySlug('contact'));


//Get Slug of current page
function getCurrentPageSlug() {
	$pageSlug = '';
	if (isset($_GET['page']) && ! empty($_GET['page'])) {
		$pageSlug = $_GET['page'];
	}
	return $pageSlug;
}

$slug = getCurrentPageSlug();
//var_dump($slug);

//Current page based on slug
$currentPage = $siteMap->getPageBySlug($slug); // Notice undefined property, line 91...
//var_dump($currentPage);

?><html>
	<head>
		<title><?=html_entity_decode($currentPage->title);?></title>
		<meta name="description" content="<?=$currentPage->description;?>">
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
					<?php
					foreach ($siteMap->getPages() as $navItem) {
						$isActive = '';
						if ($currentPage == $navItem) {
							 $isActive = ' class="active"';
						}
						echo '<li'.$isActive.'><a href="index.php?page='.$navItem->slug.'">'.$navItem->title.'</a></li>';
					}
					?>
				</ul>	
			</div>
		</div>	
		<?php
		if ($currentPage == $home)
		{
		?>
		<div id="home-page-header">
			<div class="container">
				<h1>GALAXY</h1>
				<p>Kristin's AWESOME php site!</p>
			</div>	
		</div>	
		<?php
		}
		?>
		<!-- END Header Code -->


		<!-- START Page Code -->
		<div id="page-content-area">
			<div class="container">
				<h2><?php echo $currentPage->title; ?></h2>
				<?php include('pages/'.$currentPage->template); ?>
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