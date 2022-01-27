<?php 

function loadPage($page) {
    include "header.php";
    include("routes/".$page);
}

function loadArticle($fileName, $category) {

    switch ($category) {
        case "personal":
            $backLink = "/personal";    // this is the route
            $folderRoot = "content/";   // this is the folder where the files are
            break;
        case "webDev":
            $backLink = "/web-development";
            $folderRoot = "web-dev/";
            break;
        default: 
            $backLink = "/"; // site root
    }

    include_once "utilities/markdown/index.php";
    $html = processMarkdown($folderRoot.$fileName);

    include "header.php";
    ?>

    <div id="page-content">
        <div class='single-column-layout'>
            <div class='article-back-link'>
                <?php Icon("arrow_back"); ?>
                <a href='<?php echo $backLink ?>' title='Go to list of topics'>Back to the list</a>
            </div>
            <article class='card'><?php echo $html ?></article>
            <a href='<?php echo $backLink ?>' title='Go to list of topics'>
                <p>More like this, please!</p>
            </a>
        </div>
    </div>
<?php
}

$request = $_SERVER['REQUEST_URI'];
$request = rtrim($request, '/\\'); // ignore trailing slashes

// routes are in their own file
include "routes.php";

if (isset($pageRoutes[$request])) {
    loadPage($pageRoutes[$request]);
} else if (isset($personalMDFiles[$request])) {
    loadArticle($personalMDFiles[$request], "personal");
} else if (isset($webDevMDFiles[$request])) {
    loadArticle($webDevMDFiles[$request], "webDev");
} else {
    http_response_code(404);
    include('404.php');
}

?>

