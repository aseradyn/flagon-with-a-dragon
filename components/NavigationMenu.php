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

<ul>
    <!-- <li <?php isCurrentPath("", true) ?>>
        <a href="/">Home</a>
    </li> -->
    <li <?php isCurrentPath("/info")?>>
        <a href="/info">Info</a>
    </li>
    <li <?php isCurrentPath("/webdev")?>>
        <a href="/webdev">Dev</a>
    </li>
    <li <?php isCurrentPath("/photos")?>>
        <a href="/photos">Photos</a>
    </li>
    <li <?php isCurrentPath("/hobbies")?>>
        <a href="/hobbies">Hobbies</a>
    </li>
</ul>