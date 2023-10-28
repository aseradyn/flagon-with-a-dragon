<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/utilities/parsedown/index.php";

function PrintMarkdown(string $markdown) {
    $Parsedown = new Parsedown();
    echo $Parsedown->text($markdown);
}

?>