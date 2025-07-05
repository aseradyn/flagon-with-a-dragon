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
	<link rel="stylesheet" type="text/css" href="/themes/<?= $theme ?>/highlightjs.css" />
	<link rel="stylesheet" type="text/css" href="/themes/<?= $theme ?>/photos.css" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch:wght@400;700&display=swap" rel="stylesheet">

</head>

<style>
	
	.whole-page {
		display: grid;
		grid-template-columns: 1fr auto;
		grid-template-rows: auto auto;
		grid-template-areas:
			"header header"
			"main nav";
		margin: 50px;
	}
	@media screen and (max-width: 800px) {
		.whole-page {
			margin: 0px;
		}
	}
	#pageHeader {
		grid-area: header;
		display: grid;
		grid-template-columns: 1fr auto;
		column-gap: 30px;
		padding-left: 10px;
		padding-right: 10px;
		padding-bottom: 10px;
		align-items: center;
	}
	main {
		grid-area: main;
		background-color: white;
		background-image: url("/themes/notebook/images/notebook-dark.png");
		padding: 30px;
	}
	.name-full {
		font-family: Cabin Sketch, Inter, sans-serif;
		justify-self: start;
		font-weight: bold;
		padding-top: 10px;
		font-size: 2em;
		color: white;
	}

	.home-link {
		font-family: Cabin Sketch, Inter, sans-serif;
		font-size: 1.5em;
	}
	@media screen and (max-width: 800px) {
		.home-link {
			padding-right: 10px;
		}
	}

	#siteNav {
		grid-area: nav;
		transform: rotate(90deg);
		width: 50px;
		justify-self: start;
		align-self: start;
	}
	#siteNav ul {
		position: relative;
		padding: 0;
		padding-top: 5px;
		padding-left: 20px;
		margin: 0;
		margin-bottom: -2em;
		justify-content: center;
		list-style: none;
		background-size: contain;
		width: 100vh;
	}
	#siteNav li {
		display: inline-block;
		position: relative;
		height: 100%;
		border-radius: 5px 5px 0px 0px;
		padding: 10px 0px;
		background-color: white;
	}

	#siteNav li a:after {
		opacity: 0;
		display: block;
		content: "";
		width: 20px;
		height: 20px;
		margin-left: 10px;
		background: transparent url('/themes/notebook/images/star.svg') no-repeat;
	}

	#siteNav li.active a:after {
		opacity: 1;
	}

	#siteNav li a {
		color: black;
		background-color: white;
		display: flex;
		height: 100%;
		align-items: center;
		margin: 0 1em;
		padding: 0.2em 1em;
		font-family: "impact_label_reversedregular";
		font-weight: 700;
		font-size: 1.1rem;
		text-transform: uppercase;
		letter-spacing: 0.1em;
		text-decoration: none;
		transition: color 0.2s linear;
		filter: drop-shadow(0px 0px 1px gray);
	}

	#siteNav ul li:nth-child(1) {
		background-color: #F48C06;
	}
	#siteNav ul li:nth-child(1) a { 
		transform: rotate(3deg);
	}
	#siteNav ul li:nth-child(2) {
		background-color: #E85D04;
	}
	#siteNav ul li:nth-child(2) a { 
		transform: rotate(-1deg);
	}
	#siteNav ul li:nth-child(3) {
		background-color: #DC2F02;
	}
	#siteNav ul li:nth-child(3) a { 
		transform: rotate(-2deg);
	}
	#siteNav ul li:nth-child(4) {
		background-color: #D00000;
	}
	#siteNav ul li:nth-child(4) a { 
		transform: rotate(3deg);
	}
	#siteNav ul li:nth-child(5) {
		background-color: #9D0208;
	}
	#siteNav ul li:nth-child(5) a { 
		transform: rotate(-1deg);
	}
	#siteNav ul li:nth-child(6) {
		background-color: #6A040F;
	}
	#siteNav ul li:nth-child(6) a { 
		transform: rotate(3deg);
	}
	
	#siteNav a:hover {
		color: var(--orange);
	}

</style>

<body>
	<div class="whole-page">
		<header id="pageHeader">
			<div class="name-full">jill.menning</div>
			<div class="home-link"><a href="/">Go Home!</a></div>
			
		</header>
		<nav id="siteNav">
			<?php
				include_once($_SERVER["DOCUMENT_ROOT"]."/components/NavigationMenu.php");
			?>
		</nav>
		<main>
