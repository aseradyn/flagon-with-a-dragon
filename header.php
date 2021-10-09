<?php 

// TODO: Add dark mode logic
$useDarkMode = true;

// TODO: Detect environment

include_once $_SERVER["DOCUMENT_ROOT"].'/theme/colors.php';

?>

<html>

<!-- 
    Hand-crafted artisinal code right here, lads!
    ... 
    ...
    ...
    Nah, I'm screwing with you. Nothing here but compiled mayhem.

    If you really want to snoop on the code, it's in a public repo
    https://github.com/aseradyn/flagon-with-a-dragon
-->

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php include_once $_SERVER["DOCUMENT_ROOT"].'/theme/baseStyles.php'; ?>
</head>

<?php

// Utilities
include_once $_SERVER["DOCUMENT_ROOT"]."/utilities/markdown/index.php";

// Components
include_once $_SERVER["DOCUMENT_ROOT"].'/components/icon.php';
include_once $_SERVER["DOCUMENT_ROOT"]."/components/breadcrumbs.php";

?>

<body>