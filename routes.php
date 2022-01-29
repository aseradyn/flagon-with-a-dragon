<?php

    function findPHPRoutes() {

        $Directory = new RecursiveDirectoryIterator($_SERVER["DOCUMENT_ROOT"].'/routes');
        $Iterator = new RecursiveIteratorIterator($Directory);
        $Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

        $phpRoutes = array();

        foreach($Regex as $v){
            $pathString = $v[0];                                                // blah\blah\routes/info/index.php
            $pathString = str_replace('\\', '/', $pathString);                  // blah/blah/routes/info/index.php
            $routesEnd = strrpos($pathString, "/routes/") + 7;                  
            $clippedPath = substr($pathString, $routesEnd);                     // info/index.php
            $clippedExtension = substr($clippedPath, 0, -4);                    // info/index
            
            $phpRoutes[$clippedExtension] = $clippedExtension;

            // if it's an index file, we also want the bare path
            $substring = substr($clippedExtension, -5);
            if ($substring == "index") {
                $clippedIndex = substr($clippedPath, 0, -10);                    // info
                $phpRoutes[$clippedIndex] = $clippedExtension;
            }
            
        }

        return $phpRoutes;
    }

    function findMarkdownRoutes() {

        $Directory = new RecursiveDirectoryIterator($_SERVER["DOCUMENT_ROOT"].'/routes');
        $Iterator = new RecursiveIteratorIterator($Directory);
        $Regex = new RegexIterator($Iterator, '/^.+\.md$/i', RecursiveRegexIterator::GET_MATCH);

        $markdownRoutes = array();

        foreach($Regex as $v){
            $pathString = $v[0];                                                // blah\blah\routes/info/index.php
            $pathString = str_replace('\\', '/', $pathString);                  // blah/blah/routes/info/index.php
            $routesEnd = strrpos($pathString, "/routes/") + 7;                  
            $clippedPath = substr($pathString, $routesEnd);                     // info/index.php
            $clippedExtension = substr($clippedPath, 0, -3);                    // info/index

            $markdownRoutes[$clippedExtension] = $clippedExtension;
        }

        return $markdownRoutes;
    }
    
?>
