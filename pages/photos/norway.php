<h1>Stavanger area, Norway</h1>

<p class="single-column-layout">
    Way back in 2007, I had an opportunity to travel to Stavanger for a work trip. I did a little sight-seeing while I was there!
</p>

<?php

    include_once($_SERVER["DOCUMENT_ROOT"]."/components/PhotoGallery.php");

    $photos = array();

    $photos[0] = new Photo;
    $photos[0]->path = 'v1644028730/norway/IMG_1203_1_ayk3jn.jpg';

    $photos[1] = new Photo;
    $photos[1]->path = 'v1644028725/norway/IMG_1079_sfhqmn.jpg';

    $photos[2] = new Photo;
    $photos[2]->path = 'v1644028729/norway/IMG_1084_fv3s5z.jpg';

    $photos[3] = new Photo;
    $photos[3]->path = 'v1644028729/norway/IMG_1081_ovqnfo.jpg';

    $photos[4] = new Photo;
    $photos[4]->path = 'v1644028730/norway/IMG_1095_kwuoey.jpg';

    $photos[5] = new Photo;
    $photos[5]->path = 'v1644028730/norway/IMG_1161_bzywjy.jpg';

    $photos[6] = new Photo;
    $photos[6]->path = 'v1644028730/norway/IMG_1192_wtupfv.jpg';

    

    PhotoList($photos);

?>