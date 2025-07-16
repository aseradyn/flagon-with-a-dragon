<?php

include "getCleanRequest.php";
include "findMarkdownRoutes.php";
include "findPHPRoutes.php";
include "loadContent.php";
include "handleIncludes.php";

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

handleIncludes($request);

?>