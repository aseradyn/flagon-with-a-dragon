<?php 

function loadPage($page) {
    include "header.php";
    include($page);
    include "footer.php";
}

function loadArticle($fileName) {
    include "header.php";

    $html = processMarkdown($fileName);
    echo "<article>".$html."</article>";

    include "footer.php";
}

$request = $_SERVER['REQUEST_URI'];
$request = rtrim($request, '/\\'); // ignore trailing slashes

// routes are in their own file
include "routes.php";

if (isset($pageRoutes[$request])) {
    loadPage($pageRoutes[$request]);
} else if (isset($markdownFiles[$request])) {
    loadArticle($markdownFiles[$request]);
} else {
    http_response_code(404);
    include('404.php');
}

?>

