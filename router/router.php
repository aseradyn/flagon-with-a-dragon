<?php

include($_SERVER["DOCUMENT_ROOT"]."/router/findMarkdownRoutes.php");
include($_SERVER["DOCUMENT_ROOT"]."/router/findPHPRoutes.php");
include($_SERVER["DOCUMENT_ROOT"]."/router/loadContent.php");

$originalRequest = $_SERVER['REQUEST_URI'];
$request = rtrim($originalRequest, '/\\'); // ignore trailing slashes

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
} else if (strpos($originalRequest, "/tools/")) {
   $pos = strpos($originalRequest, "/tools/");
   $endpos = $pos + 8;
   include($_SERVER["DOCUMENT_ROOT"]."/tools/".substr($originalRequest, $endpos));
} else {
   http_response_code(404);
   echo "Tried to find: " . $request;
   include('404.php');
}


?>