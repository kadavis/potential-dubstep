<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class Page
{
	public $id;
	public $slug;
	public $title;
	public $description;
	public $template;
}

class Pages
{
	private $all_pages;

	public function getPageBySlug($slug)
	{
		if($this->all_pages)
		{
			foreach($this->all_pages as $p)
			{
				if($p->slug==$slug) return $p;
			}
			return $this->all_pages[0];
		}
		return false;
	}

	public function addPage($page)
	{
		$this->all_pages[] = $page;
	}

	public function getPages()
	{
		return $this->all_pages;
	}
}

// Instances of the page class
$home = new Page;
$home->id = 'home';
$home->slug = 'home';
$home->title = 'Welcome to GALAXY';
$home->description = 'Home page';
$home->template = 'home.php';

$about = new Page;
$about->id = 'about';
$about->slug = 'about';
$about->title = 'About';
$about->description = 'About page';
$about->template = 'about.php';

$contact = new Page;
$contact->id = 'contact';
$contact->slug = 'contact';
$contact->title = 'Contact';
$contact->description = 'Contact page';
$contact->template = 'contact.php';

$stuff = new Page;
$stuff->id = 'stuff';
$stuff->slug = 'stuff';
$stuff->title = 'Stuff';
$stuff->description = 'Stuff page';
$stuff->template = 'stuff.php';

$things = new Page;
$things->id = 'things';
$things->slug = 'things';
$things->title = 'Things';
$things->description = 'Things page';
$things->template = 'things.php';

// Instance of the pages class
$pages = new Pages;
$pages->addPage($home);
$pages->addPage($iDidIt);
$pages->addPage($about);
$pages->addPage($contact);
$pages->addPage($stuff);
$pages->addPage($things);

function getPageSlug()
{
	$pageSlug = '';
	if(isset($_GET['page']) && ! empty($_GET['page']))
	{
		$pageSlug = $_GET['page'];
	}
	return $pageSlug;
}

$slug = getPageSlug();
$currentPage = $pages->getPageBySlug($slug);

?><html>
	<head>
		<title><?php echo html_entity_decode($currentPage->title);?></title>
		<meta name="description" content="<?php echo $currentPage->description;?>">
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
					foreach ($pages->getPages() as $navItem)
					{
						$isActive = '';
						if ($currentPage == $navItem)
						{
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