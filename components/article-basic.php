<?php

    include $_SERVER["DOCUMENT_ROOT"]."/header.php";
    Breadcrumbs();
    if (!isset($fileName)) {
        $fileName = "index.md";
    }
    $html = processMarkdown("$fileName");
    echo "<article>".$html."</article>";
    include $_SERVER["DOCUMENT_ROOT"]."/footer.php";

?>