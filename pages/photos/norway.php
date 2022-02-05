<h1>Stavanger area, Norway</h1>

<p class="single-column-layout">
    Way back in 2007, I had an opportunity to travel to Stavanger for a work trip. I did a little sight-seeing while I was there!
</p>

<?php

    include_once($_SERVER["DOCUMENT_ROOT"]."/components/PhotoGallery.php");

    $photos = array();

    $photo = new Photo;
    $photo->path = 'v1644028730/norway/IMG_1203_1_ayk3jn.jpg';
    $photos[] = $photo;

    $photo = new Photo;
    $photo->path = 'v1644028725/norway/IMG_1079_sfhqmn.jpg';
    $photos[] = $photo;

    $photo = new Photo;
    $photo->path = 'v1644028729/norway/IMG_1084_fv3s5z.jpg';
    $photos[] = $photo;

    $photo = new Photo;
    $photo->path = 'v1644028729/norway/IMG_1081_ovqnfo.jpg';
    $photos[] = $photo;

    $photo = new Photo;
    $photo->path = 'v1644028730/norway/IMG_1095_kwuoey.jpg';
    $photos[] = $photo;

    $photo = new Photo;
    $photo->path = 'v1644028730/norway/IMG_1161_bzywjy.jpg';
    $photos[] = $photo;

    $photo = new Photo;
    $photo->path = 'v1644028730/norway/IMG_1192_wtupfv.jpg';
    $photos[] = $photo;

    PhotoList($photos);

?>