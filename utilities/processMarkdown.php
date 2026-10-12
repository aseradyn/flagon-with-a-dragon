<?php
    require_once __DIR__.'/SiteParsedown.php';

    // takes a relative file path
    function processMarkdown(string $filePath) {
        $file = file_get_contents($filePath, "r");
        $html = SiteParsedown::instance()->text($file);
        return $html;
    }

?>