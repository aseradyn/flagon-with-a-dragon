<?php 

    function loadWebComponents(string $pageContent) {
        $needPhotoGallery = str_contains($pageContent, "<photo-gallery");
        if ($needPhotoGallery) {
            include_once($_SERVER["DOCUMENT_ROOT"]."/components/photo-gallery/photo-gallery.php");
        }
    }

?>