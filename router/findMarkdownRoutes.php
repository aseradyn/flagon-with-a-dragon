<?php

function findMarkdownRoutes() {

    $Directory = new RecursiveDirectoryIterator($_SERVER["DOCUMENT_ROOT"].'/pages');
    $Iterator = new RecursiveIteratorIterator($Directory);
    $Regex = new RegexIterator($Iterator, '/^.+\.md$/i', RecursiveRegexIterator::GET_MATCH);

    $markdownRoutes = array();

    foreach($Regex as $v){
        $pathString = $v[0];                                                // blah\blah\pages/info/index.php
        $pathString = str_replace('\\', '/', $pathString);                  // blah/blah/pages/info/index.php
        $pagesEnd = strrpos($pathString, "/pages/") + 6;                  
        $clippedPath = substr($pathString, $pagesEnd);                     // info/index.php
        $clippedExtension = substr($clippedPath, 0, -3);                    // info/index

        $markdownRoutes[$clippedExtension] = $clippedExtension;

        // if it's an index file, we also want the bare path
        if (substr($clippedExtension, -6) == "/index") {
            $clippedIndex = substr($clippedExtension, 0, -6);              // info
            $markdownRoutes[$clippedIndex] = $clippedExtension;
        }
    }

    return $markdownRoutes;
}

?>