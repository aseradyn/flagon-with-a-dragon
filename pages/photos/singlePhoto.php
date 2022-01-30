<?php

    $path = $_GET["path"];

    // display it full size
    include_once($_SERVER["DOCUMENT_ROOT"]."/components/Photo.php");

    $photo = new Photo;
    $photo->path = $path;

    echo "<div class='singlePhotoPage-wrapper'>";
    Photo($photo, "fullSize");
    echo "</div>";

?>

<style>
    .singlePhotoPage-wrapper {
        max-width: 1000px; 
        margin-top: 40px; 
        margin-left: auto; 
        margin-right: auto;
    }
</style>