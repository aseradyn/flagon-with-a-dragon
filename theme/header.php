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
	<nav id="siteNav">
		<svg viewBox="0 0 2 3" aria-hidden="true">
			<path d="M0,0 L1,2 C1.5,3 1.5,3 2,3 L2,0 Z" />
		</svg>
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
		<svg viewBox="0 0 2 3" aria-hidden="true">
			<path d="M0,0 L0,3 C0.5,3 0.5,3 1,2 L2,0 Z" />
		</svg>
	</nav>
</header>

<style>
    #page {
        min-height: 100vh;
        display: grid;
        grid-template-rows: auto 5em;
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
		align-items: center;
	}
    .name-full {
		display: none;
	}
	@media screen and (min-width: 50em) {
		.name-full {
			display: block;
		}
		.name-clipped {
			display: none;
		}
	}

    #siteNav {
		display: flex;
		justify-content: center;
		--background: rgba(255, 255, 255, 0.1);
		filter: drop-shadow(0px 0px 15px #000);
	}
	#siteNav svg {
		width: calc(2em + 3px);
		height: calc(3em + 5px);
		display: block;
	}
	#siteNav path {
		fill: var(--background);
	}
	#siteNav ul {
		position: relative;
		padding: 0;
		padding-top: 5px;
		margin: 0;
		height: 3em;
		display: flex;
		justify-content: center;
		align-items: center;
		list-style: none;
		background: var(--background);
		background-size: contain;
	}
	#siteNav li {
		position: relative;
		height: 100%;
		
	}
	#siteNav li.active::before {
		--size: 6px;
		content: '';
		width: 0;
		height: 0;
		position: absolute;
		top: 0;
		left: calc(50% - var(--size));
		border: var(--size) solid transparent;
		border-top: var(--size) solid var(--accent500);
	}
	#siteNav a {
		display: flex;
		height: 100%;
		align-items: center;
		padding: 0 1em;
		color: var(--heading-color);
		font-weight: 700;
		font-size: 0.8rem;
		text-transform: uppercase;
		letter-spacing: 0.1em;
		text-decoration: none;
		transition: color 0.2s linear;
	}
	#siteNav a:hover {
		color: var(--accent-color);
	}
</style>