<?php 

$request = $_SERVER['REQUEST_URI'];

if (str_contains($request, "/tools/superbowl-squares-generator")) {
    include($_SERVER["DOCUMENT_ROOT"]."/tools/superbowl-squares-generator.php");
    return;
}


include($_SERVER["DOCUMENT_ROOT"]."/theme/header.php");

include($_SERVER["DOCUMENT_ROOT"]."/router/router.php");

?>

<div style="margin-bottom: 40px;"></div>
<script src="/utilities/htmx.min.js"></script>