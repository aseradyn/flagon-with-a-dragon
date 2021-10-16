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

    $pageRoutes = array(
        "" => "home.php",
        "/" => "home.php",
        "/personal" => "personal/personal.php",
        "/professional" => "professional/professional.php"
    );

    $markdownFiles = array(
        "/blog-with-markdown" => "personal/content/blog-with-markdown.md",
        "/prettier-paths-with-htaccess" => "personal/content/prettier-paths-with-htaccess.md",
        "/highlight-menu-location" => "personal/content/highlight-menu-location.md",
        "/links-in-php-and-html" => "personal/content/links-in-php-and-html.md"
    );

    if (isset($pageRoutes[$request])) {
        loadPage($pageRoutes[$request]);
    } else if (isset($markdownFiles[$request])) {
        loadArticle($markdownFiles[$request]);
    } else {
        http_response_code(404);
        include('404.php');
    }

?>