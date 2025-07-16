<?php

function handleIncludes(string $request) {

    // Load these for all pages
    echo '<link rel="stylesheet" href="/components/photo-gallery/photo-gallery.css" />';
    echo '<script src="/components/photo-gallery/photo-gallery.js"></script>';

    // Load for pages in the lists

    include "includes/table-of-contents.php";
    $showTableOfContents = includeTableOfContents();
    if (in_array($request, $showTableOfContents)) {
        echo '<link rel="stylesheet" href="/components/table-of-contents/table-of-contents.css" />';
        echo '<script src="/components/table-of-contents/table-of-contents.js"></script>';
    }

    include "includes/htmx.php";
    $includeHTMX = includeHTMX();
    if (in_array($request, $includeHTMX)) {
        echo '<script src="/utilities/htmx.min.js"></script>';
    }
    }

?>