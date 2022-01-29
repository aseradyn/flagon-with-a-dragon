<?php 

include "header.php";

function loadPage($path) {
    include("routes/".$path.".php");
}

function loadArticle($fileName) {

    include_once "utilities/markdown/index.php";
    $html = processMarkdown($_SERVER["DOCUMENT_ROOT"]."/routes".$fileName.".md");

    ?>
    <article class='single-column-layout'>
        <?php echo $html ?>
    </article>
    
<?php
}

$request = $_SERVER['REQUEST_URI'];
$request = rtrim($request, '/\\'); // ignore trailing slashes

// routes are in their own file
include "routes.php";

$phpRoutes = findPHPRoutes();
$markdownRoutes = findMarkdownRoutes();

 if ($request == "") {
     loadPage("index");
 } else if (isset($phpRoutes[$request])) {
    include("routes/".$phpRoutes[$request].".php");
} else if (isset($markdownRoutes[$request])) {
    loadArticle($markdownRoutes[$request]);
 } else {
    http_response_code(404);
    include('404.php');
}

?>

<div style="margin-bottom: 40px;"></div>