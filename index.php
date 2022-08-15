<?php 

$request = $_SERVER['REQUEST_URI'];

// Routes that should bypass the header and router

if (str_contains($request, "/tools/superbowl-squares-generator")) {
    include($_SERVER["DOCUMENT_ROOT"]."/tools/superbowl-squares-generator.php");
    return;
}

if (str_contains($request, "/tools/color-mode")) {
    include($_SERVER["DOCUMENT_ROOT"]."/tools/color-mode.php");
    return;
}

include($_SERVER["DOCUMENT_ROOT"]."/auth/auth0_initialization.php");

if (str_contains($request, "/auth/login")) {
    include($_SERVER["DOCUMENT_ROOT"]."/auth/login.php");
    return;
}

if (str_contains($request, "/auth/logout")) {
    include($_SERVER["DOCUMENT_ROOT"]."/auth/logout.php");
    return;
}

if (str_contains($request, "/auth/profile")) {
    include($_SERVER["DOCUMENT_ROOT"]."/auth/profile.php");
    return;
}

if (str_contains($request, "/callback")) {
    include($_SERVER["DOCUMENT_ROOT"]."/auth/callback.php");
    return;
}

// Main site content

include($_SERVER["DOCUMENT_ROOT"]."/theme/header.php");

include($_SERVER["DOCUMENT_ROOT"]."/router/router.php");

?>

<div style="margin-bottom: 40px;"></div>
<script src="/utilities/htmx.min.js"></script>