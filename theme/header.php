<!-- 
    Hand-crafted artisinal code right here, folks!


    If you want to see how it is built, it's in a public repo, which may be easier to examine:
    https://github.com/aseradyn/flagon-with-a-dragon
-->

<?php

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
<html lang="en">

<head>
    <title>Jill Menning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="/theme/fonts.css" />
	<link rel="stylesheet" type="text/css" href="/theme/base-elements.css" />
	<link rel="stylesheet" type="text/css" href="/theme/layout.css" />
	<link rel="stylesheet" type="text/css" href="/theme/containers.css" />
	<link rel="stylesheet" type="text/css" href="/theme/scrollbars.css" />
	<link rel="stylesheet" type="text/css" href="/theme/highlightjs.css" />
	<link rel="stylesheet" type="text/css" href="/theme/photos.css" />
	<link rel="stylesheet" type="text/css" href="/theme/header.css" />

</head>

<body>

<header id="pageHeader">
	<div class="name-full"><a href="/">jill.menning</a></div>
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
