<?php 

session_start();
$_SESSION["theme"] = "notebook";
$theme = $_SESSION["theme"];

$request = $_SERVER['REQUEST_URI'];

// Routes that should bypass the router and don't get a theme
// /blog/ routes are handled in .htaccess

if (str_contains($request, "/tools/superbowl-squares-generator")) {
    include($_SERVER["DOCUMENT_ROOT"]."/tools/superbowl-squares-generator.php");
    return;
}

if (str_contains($request, "ephemera/rss")) {
    include($_SERVER["DOCUMENT_ROOT"]."/pages/ephemera/rss.php");
    return;
}

// Main site content

include($_SERVER["DOCUMENT_ROOT"]."/router/router.php");

?>
