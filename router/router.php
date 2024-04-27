<?php

include($_SERVER["DOCUMENT_ROOT"]."/router/findMarkdownRoutes.php");
include($_SERVER["DOCUMENT_ROOT"]."/router/findPHPRoutes.php");
include($_SERVER["DOCUMENT_ROOT"]."/router/loadContent.php");

$request = $_SERVER['REQUEST_URI'];
$request = rtrim($request, '/\\'); // ignore trailing slashes

// ignore parameters
$parametersPosition = strpos($request, "?");
if ($parametersPosition) {
   $request = substr($request, 0, $parametersPosition);
}

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
echo '<script src="/components/photo-gallery/photo-gallery.js" />';

?>