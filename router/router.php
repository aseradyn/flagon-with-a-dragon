<?php

include($_SERVER["DOCUMENT_ROOT"]."/router/findMarkdownRoutes.php");
include($_SERVER["DOCUMENT_ROOT"]."/router/findPHPRoutes.php");
include($_SERVER["DOCUMENT_ROOT"]."/router/loadContent.php");

$request = strtolower($_SERVER['REQUEST_URI']);
$request = rtrim($request, '/\\'); // ignore trailing slashes

// ignore parameters
$parametersPosition = strpos($request, "?");
if ($parametersPosition) {
   $request = substr($request, 0, $parametersPosition);
}

// api routes should not have header/footer, and should return once done
$apiRoutes = [
   "/tools/superbowl-squares-generator",
   "/auth/login",
   "/auth/logout",
   "/auth/profile",
];
if (in_array($request, $apiRoutes, false)) {
   include($_SERVER["DOCUMENT_ROOT"].$request.".php");
   return;
}

// this one is just special because it's wrong
if (str_contains($request, "/callback")) {
   include($_SERVER["DOCUMENT_ROOT"]."/auth/callback.php");
   return;
}

$phpRoutes = findPHPRoutes();
$markdownRoutes = findMarkdownRoutes();

if ($request == "" || $request == "/") {
    loadPage("index");
} else if (isset($phpRoutes[$request])) {
   loadPage($phpRoutes[$request]);
} else if (isset($markdownRoutes[$request])) {
   loadArticle($markdownRoutes[$request]);
} else {
   include($_SERVER["DOCUMENT_ROOT"]."/theme/header.php");
   http_response_code(404);
   include('404.php');
}

?>