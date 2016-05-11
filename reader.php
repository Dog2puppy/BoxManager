<?php
error_reporting(-1);
if (isset($_GET["thread"])) {
	$id = htmlspecialchars($_GET["thread"]);
	
	if(!file_exists("resources/$id.thread")) {
	echo "<script>location.replace('index.php');</script>";
	} else {
		require_once("config-types/yaml.php");
		$cfg = new YamlConfig("resources/$id.thread");
		$name = $cfg->get("Name");
		$title = $cfg->get("Title");
		$version =  = $cfg->get("Version");
		$dllink =  = $cfg->get("Download");
		$contents = $cfg->get("Text");
		require_once("parser.php");
		$parse = new Parser();
		$contents = $parse->parse($contents);
	}
}
if(!isset($id)) {
	echo "<script>location.replace('index.php');</script>";
}
?>
<html>
<head>
<title><?php echo $name . " version " . $version ?></title>
<link rel="stylesheet" href="/css/skel.css" />
<link rel="stylesheet" href="/css/style.css" />
<link rel="stylesheet" href="/css/style-xlarge.css" />
<script src="/js/jquery.min.js"></script>
<script src="/js/skel.min.js"></script>
<script src="/js/skel-layers.min.js"></script>
<script src="/js/init.js"></script>
</head>
<body>
<header id="header" class="skel-layers-fixed">
				<a href="/"><img src="images/logo.png" height="43" width="43"></img></a>
				<nav id="nav">
					<ul>
						<li><a href="signup/">Sign up</a></li>
						<li><a href="login/">Login</a></li>
					</ul>
			</nav>
</header>

<section id="one" class="wrapper style1">
<center><img src='images/<? echo $name ?>.png'></img><h3>Resource <?php echo $name . " version " . $version ?></h3></center><center><a class="button big special" href="<? echo $dllink?>">Download resource</a></center>
				<header class="major">
				 <div class="container">
					 <section class="special box">
					 <?php echo $contents ?>
					 <?php include 'ratings/hrat.php'?>
					 </section>
				</div>
			</header>
</section>
</body>
<p><a href="http://boxofdevs.ml">© 2016 BoxManager - BoxOfDevs team.</a></p>
</html>
