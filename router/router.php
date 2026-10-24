<?php

include "getCleanRequest.php";
include "themeOverrides.php";
include "findMarkdownRoutes.php";
include "findPHPRoutes.php";
include "loadContent.php";
include "handleIncludes.php";

$request = getCleanRequest();

// Resolve the route before any output, so the status code can still be set

$phpRoutes = findPHPRoutes();
$markdownRoutes = findMarkdownRoutes();

$isHome = $request == "" || $request == "/";
$isFound = $isHome || isset($phpRoutes[$request]) || isset($markdownRoutes[$request]);

if (!$isFound) {
   http_response_code(404);
}

// Apply template

$didOverrideTheme = handleThemeOverrides($request);
if (!$didOverrideTheme) {
   include($_SERVER["DOCUMENT_ROOT"]."/router/includes/document-start.php");
   include($_SERVER["DOCUMENT_ROOT"]."/themes/$theme/header.php");
}

// Load page content

if ($isHome) {
    loadPage("index");
} else if (isset($phpRoutes[$request])) {
   include($_SERVER["DOCUMENT_ROOT"]."/pages/".$phpRoutes[$request].".php");
} else if (isset($markdownRoutes[$request])) {
   loadArticle($markdownRoutes[$request]);
} else {
   echo "Tried to find: " . htmlspecialchars($request, ENT_QUOTES, 'UTF-8');
   include($_SERVER["DOCUMENT_ROOT"]."/404.php");
}

// Load supplemental files
handleIncludes($request);

if (!$didOverrideTheme) {
   echo '<div style="margin-bottom: 40px;"></div>';
   include($_SERVER["DOCUMENT_ROOT"]."/themes/$theme/footer.php");
   include($_SERVER["DOCUMENT_ROOT"]."/router/includes/document-end.php");
}

?>