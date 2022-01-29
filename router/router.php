<?php

include($_SERVER["DOCUMENT_ROOT"]."/router/findMarkdownRoutes.php");
include($_SERVER["DOCUMENT_ROOT"]."/router/findPHPRoutes.php");
include($_SERVER["DOCUMENT_ROOT"]."/router/loadContent.php");

$request = $_SERVER['REQUEST_URI'];
$request = rtrim($request, '/\\'); // ignore trailing slashes

$phpRoutes = findPHPRoutes();
$markdownRoutes = findMarkdownRoutes();

if ($request == "") {
    loadPage("index");
} else if (isset($phpRoutes[$request])) {
   include($_SERVER["DOCUMENT_ROOT"]."/pages/".$phpRoutes[$request].".php");
} else if (isset($markdownRoutes[$request])) {
   loadArticle($markdownRoutes[$request]);
} else {
   http_response_code(404);
   include('404.php');
}


?>