<!-- 
    Hand-crafted artisinal code right here, folks!


    If you want to see how it is built, it's in a public repo, which may be easier to examine:
    https://github.com/aseradyn/flagon-with-a-dragon
-->

<?php

session_start();

function isCurrentPath($pathString, $onlyExact = false) {
	$currentPath = $_SERVER['REQUEST_URI'];
	$currentPath = rtrim($currentPath, '/\\'); // ignore trailing slashes
    
    if ($pathString == $currentPath) {
        echo 'class="active"';
        return true;
    } else if (!$onlyExact && stristr($currentPath, $pathString)) {
        echo 'class="active"';
        return true;
    } else {
        return false;
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Jill Menning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
		<?php 
			include_once($_SERVER["DOCUMENT_ROOT"]."/theme/fonts.css");
			include_once($_SERVER["DOCUMENT_ROOT"]."/theme/base-elements.css");
			include_once($_SERVER["DOCUMENT_ROOT"]."/theme/layout.css"); 
			include_once($_SERVER["DOCUMENT_ROOT"]."/theme/containers.css"); 
			include_once($_SERVER["DOCUMENT_ROOT"]."/theme/header.css"); 
			include_once($_SERVER["DOCUMENT_ROOT"]."/theme/scrollbars.css");
			include_once($_SERVER["DOCUMENT_ROOT"]."/theme/highlightjs.css"); 
		
			if (isset($_SESSION["mode"]) && $_SESSION["mode"] == "night") {

				?>
					body {
						--baseFont: white;
		
						--turquoise-values: 206, 231, 235;
						--turquoise: rgb(var(--turquoise-values));
						--turquoise-half: rgb(var(--turquoise-values), 0.5);
						--coral: #E84855;
						--dark-red: #590925;
						--bright-red: #9F0E41;
						--orange: #FC8755;
		
						color: var(--baseFont);
						background-color: black;
						background-image: url("/theme/images/ffflurry.svg");
					}
				<?php
		
				}
		
		?>

	</style>
	<link rel="stylesheet" href="/theme/font-awesome.css" />

</head>

<body>

<header id="pageHeader">
	<div class="name-full"><a href="/">jill.menning</a></div>
	<div id="page-widgets">
		<i class="fa fa-adjust" style="font-size: 1.2em"></i>
		<i class="fa fa-ravelry"></i>
		<i class="fa fa-twitter"></i>
		<i class="fa fa-rss"></i>
	</div>
	<nav id="siteNav">
		<ul>
			<li <?php isCurrentPath("", true) ?>>
				<a href="/">Home</a>
			</li>
			<li <?php isCurrentPath("/info")?>>
				<a href="/info">Info</a>
			</li>
			<li <?php isCurrentPath("/webdev")?>>
				<a href="/webdev">Web Dev</a>
			</li>
			<li <?php isCurrentPath("/photos")?>>
				<a href="/photos">Photos</a>
			</li>
			<li <?php isCurrentPath("/hobbies")?>>
				<a href="/hobbies">Hobbies</a>
			</li>
		</ul>
	</nav>
</header>

<main>

<?php
	include_once($_SERVER["DOCUMENT_ROOT"]."/components/color-mode-switcher.php");
	if (!isset($_SESSION["mode"])) {
		$_SESSION["mode"] = "day";
	}
	colorMode($_SESSION["mode"]);

?>