<?php
    require_once 'Parsedown.php';

    function processMarkdown($file) {
        $html = Parsedown::instance()->text($file);
        return $html;
    }

?>