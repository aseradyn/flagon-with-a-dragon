<?php

function isCurrentPath( array $pathArray, $onlyExact = false) {
	$currentPath = $_SERVER['REQUEST_URI'];
	$currentPath = rtrim($currentPath, '/\\'); // ignore trailing slashes

    foreach($pathArray as $pathString) {
        if (stristr($currentPath, $pathString)) {
            echo 'class="active"';
            return true;
        }
    }
    return false;
}
?>

<ul>
    <li <?php isCurrentPath(array("/info")) ?>>
        <a href="/info">Info</a>
    </li>
    <li <?php isCurrentPath(array("/life", "/places", "/pets")) ?>>
        <a href="/life">Life</a>
    </li>
    <li <?php isCurrentPath(array("/food")) ?>>
        <a href="/food">Food</a>
    </li>
    <li <?php isCurrentPath(array("/webdev")) ?>>
        <a href="/webdev">Dev</a>
    </li>
    <li <?php isCurrentPath(array("/hobbies"))?>>
        <a href="/hobbies">Hobbies</a>
    </li>
</ul>