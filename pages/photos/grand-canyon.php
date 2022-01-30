<h1>The Grand Canyon</h1>

<p class="single-column-layout">
    Wow. Just ... wow. This place is really something to see. It's beautiful, and awesome, and there is soooo much to look at. Every part of the park
    gives you a different angle, exposing different colors and textures. I just couldn't get enough of it.
</p>

<?php

    include_once($_SERVER["DOCUMENT_ROOT"]."/components/PhotoGallery.php");

    $photos = array();

    $photos[0] = new Photo;
    $photos[0]->caption = "There was snow along the rim of the canyon, and down along the shaded cliff faces";
    $photos[0]->path = 'v1643291882/grand-canyon/PC220176_wywx24.jpg';
    $photos[0]->alt = 'Steep rocky cliffs, with white snow and small green shrubs anywhere it levels off enough to collect soil.';

    $photos[1] = new Photo;
    $photos[1]->caption = 'The sedimentary layers of the canyon are wildly different colors. Here, it was red, almost pink, but the water has begun to expose the pale brown layer beneath it.';
    $photos[1]->path = 'v1643291886/grand-canyon/PC220183_qh2g9l.jpg';
    $photos[1]->alt = 'A close-up of red and pink rock, eroded into smooth but complex curves, cut through by a narrow water channel (currently dry)';

    $photos[2] = new Photo;
    $photos[2]->path = 'v1643291881/grand-canyon/PC220186_dgernf.jpg';

    $photos[3] = new Photo;
    $photos[3]->path = 'v1643291884/grand-canyon/PC220194_ljpyhw.jpg';

    $photos[4] = new Photo;
    $photos[4]->path = 'v1643291884/grand-canyon/PC220200_wfimwn.jpg';

    $photos[5] = new Photo;
    $photos[5]->path = 'v1643291886/grand-canyon/PC220201_sfjmuh.jpg';

    $photos[6] = new Photo;
    $photos[6]->path = 'v1643291887/grand-canyon/PC220204_zjjkxw.jpg';
    
    $photos[7] = new Photo;
    $photos[7]->path = 'v1643291887/grand-canyon/PC220208_eu5m7u.jpg';
    
    $photos[8] = new Photo;
    $photos[8]->path = 'v1643291888/grand-canyon/PC220219_uxhdo7.jpg';
    
    $photos[9] = new Photo;
    $photos[9]->path = 'v1643291888/grand-canyon/PC220228_luskon.jpg';

?>



<?php 

    PhotoList($photos);

?>