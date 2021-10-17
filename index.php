<?php 

function loadPage($page) {
    include "header.php";
    include($page);
    include "footer.php";
}

function loadArticle($fileName) {
    include "header.php";

    $html = processMarkdown($fileName);
    echo "<article class='card'>$html</article>";

    include "footer.php";
}

function loadPersonalArticle($fileName) {
    include "header.php";

    echo "<div class='article-back-link'>";
    Icon("arrow_back");
    echo "<a href='/personal' title='Go to list of topics'>Back to the list</a>";
    echo "</div>";

    $html = processMarkdown("personal/content/".$fileName);
    echo "<article class='card'>$html</article>";

    echo "<a href='/personal' title='Go to list of topics'><p>More like this, please!</p></a>";

    include "footer.php";
}

$request = $_SERVER['REQUEST_URI'];
$request = rtrim($request, '/\\'); // ignore trailing slashes

// routes are in their own file
include "routes.php";

if (isset($pageRoutes[$request])) {
    loadPage($pageRoutes[$request]);
// } else if (isset($markdownFiles[$request])) {
//     loadArticle($markdownFiles[$request]);
} else if (isset($personalMDFiles[$request])) {
    loadPersonalArticle($personalMDFiles[$request]);
} else {
    http_response_code(404);
    include('404.php');
}

?>

