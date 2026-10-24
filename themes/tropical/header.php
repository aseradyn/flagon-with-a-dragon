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
<div class="pageHeader-background">
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
			<li <?php isCurrentPath("/unsolicited")?>>
				<a href="/unsolicited">Advice</a>
			</li>
			<li <?php isCurrentPath("/hobbies")?>>
				<a href="/hobbies">Hobbies</a>
			</li>

			</ul>
	</nav>
</header>
</div>

<main>
