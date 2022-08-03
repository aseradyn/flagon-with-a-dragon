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
<html>

<head>
    <title>Jill Menning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<style>
	<?php include_once($_SERVER["DOCUMENT_ROOT"]."/theme/colors.css"); ?>
	<?php include_once($_SERVER["DOCUMENT_ROOT"]."/theme/baseStyles.css"); ?>
</style>

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

<style>
    #page {
        min-height: 100vh;
        display: grid;
        grid-template-rows: auto 5em;
		align-content: start;
    }
    #page-content {
        padding: 20px;
    }
    @media screen and (max-width: 500px) {
        #page-content {
            padding-left: 10px;
            padding-right: 10px;
        }
    }
    #pageHeader {
		display: grid;
		grid-template-rows: auto auto;
		column-gap: 30px;
		background-color: rgb(206,231,235, 0.7);
		margin-bottom: 20px;
		padding-left: 10px;
		padding-right: 10px;
	}
    .name-full {
		font-family: Merienda, Inter, sans-serif;
		justify-self: center;
		font-weight: bold;
		padding-top: 10px;
		font-size: 1.15em;
	}
	.name-full > a {
		text-decoration: none;
	}

    #siteNav {
		display: flex;
		justify-content: center;
		justify-self: center;
	}
	#siteNav ul {
		position: relative;
		padding: 0;
		padding-top: 5px;
		margin: 0;
		margin-top: 1em;
		height: 2em;
		display: flex;
		justify-content: center;
		list-style: none;
		background-size: contain;
	}
	#siteNav li {
		position: relative;
		height: 100%;
		
	}
	#siteNav li.active {
		border-bottom: 2px double #E84855;
	}
	#siteNav a {
		display: flex;
		height: 100%;
		align-items: center;
		padding: 0 2em;
		color: var(--heading-color);
		font-weight: 700;
		font-size: 0.8rem;
		text-transform: uppercase;
		letter-spacing: 0.1em;
		text-decoration: none;
		transition: color 0.2s linear;
	}
	#siteNav a:hover {
		color: #E84855;
	}
</style>