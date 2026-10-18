<!-- 
    Hand-crafted artisinal code right here, folks!

    If you want to see how it is built, it's in a public repo, which may be easier to examine:
    https://github.com/aseradyn/flagon-with-a-dragon
-->

<?php

$theme = $_SESSION["theme"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Jill Menning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="/themes/<?= $theme ?>/fonts.css" />
	<link rel="stylesheet" type="text/css" href="/themes/<?= $theme ?>/base-elements.css" />
	<link rel="stylesheet" type="text/css" href="/themes/<?= $theme ?>/layout.css" />
	<link rel="stylesheet" type="text/css" href="/themes/<?= $theme ?>/containers.css" />
	<link rel="stylesheet" type="text/css" href="/themes/<?= $theme ?>/scrollbars.css" />
	<link rel="stylesheet" type="text/css" href="/themes/<?= $theme ?>/highlightjs.css" />
	<link rel="stylesheet" type="text/css" href="/themes/<?= $theme ?>/photos.css" />
	<link rel="stylesheet" type="text/css" href="/themes/<?= $theme ?>/header.css" />
	<!--<link rel="stylesheet" type="text/css" href="/themes/<?= $theme ?>/flag.css" /> -->

</head>

<body>
<div class="pageHeader-background">
<header id="pageHeader">
	<div class="name-full"><a href="/">jill.menning</a></div>
	<nav id="siteNav">
		<?php
			include_once($_SERVER["DOCUMENT_ROOT"]."/components/NavigationMenu.php");
		?>
	</nav>
</header>
</div>

<main>
