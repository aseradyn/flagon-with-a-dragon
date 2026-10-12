<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/utilities/processMarkdown.php";

function PrintMarkdown(string $markdown) {
    $Parsedown = new SiteParsedown();
    echo $Parsedown->text($markdown);
}

?>