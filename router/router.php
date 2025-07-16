<?php

include("getCleanRequest.php");
include("findMarkdownRoutes.php");
include("findPHPRoutes.php");
include("loadContent.php");

$request = getCleanRequest();
$phpRoutes = findPHPRoutes();
$markdownRoutes = findMarkdownRoutes();

if ($request == "" || $request == "/") {
    loadPage("index");
} else if (isset($phpRoutes[$request])) {
   include($_SERVER["DOCUMENT_ROOT"]."/pages/".$phpRoutes[$request].".php");
} else if (isset($markdownRoutes[$request])) {
   loadArticle($markdownRoutes[$request]);
} else {
   http_response_code(404);
   echo "Tried to find: " . $request;
   include('404.php');
}

echo '<link rel="stylesheet" href="/components/photo-gallery/photo-gallery.css" />';
echo '<script src="/components/photo-gallery/photo-gallery.js"></script>';

echo '<link rel="stylesheet" href="/components/table-of-contents/table-of-contents.css" />';
echo '<script src="/components/table-of-contents/table-of-contents.js"></script>';

?>