<?php
    require_once 'Parsedown.php';

    // takes a relative file path
    function processMarkdown(string $filePath) {
        $file = file_get_contents($filePath, "r");
        $html = Parsedown::instance()->text($file);
        return $html;
    }

?>