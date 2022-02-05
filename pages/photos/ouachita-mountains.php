<h1>The Ouachita Mountains</h1>

<p class="single-column-layout">
    The Ouachita Mountains are a lovely, homey stretch of old, old mountains covered with deciduous forest and 
    criss-crossed by narrow, winding roads. I visited in November 2018.
</p>

<?php

    include_once($_SERVER["DOCUMENT_ROOT"]."/components/PhotoGallery.php");

    $photos = array();

    $photos[0] = new Photo;
    $photos[0]->path = 'v1644026826/ouachita-mountains/2018-11-13_09.09.54_dtzrg3.jpg';

    $photos[1] = new Photo;
    $photos[1]->path = 'v1644026818/ouachita-mountains/2018-11-13_09.28.42_gw8glc.jpg';

    $photos[2] = new Photo;
    $photos[2]->path = 'v1644026821/ouachita-mountains/2018-11-13_09.37.49_cltgtw.jpg';

    $photos[3] = new Photo;
    $photos[3]->path = 'v1644026820/ouachita-mountains/2018-11-13_09.38.10_p1jexp.jpg';

    $photos[4] = new Photo;
    $photos[4]->path = 'v1644026821/ouachita-mountains/2018-11-13_09.41.44_o5vw8e.jpg';

    $photos[5] = new Photo;
    $photos[5]->path = 'v1644026827/ouachita-mountains/2018-11-16_09.06.52_jprph5.jpg';

    $photos[6] = new Photo;
    $photos[6]->path = 'v1644026820/ouachita-mountains/2018-11-16_18.18.08_iurmfc.jpg';
    
    $photos[7] = new Photo;
    $photos[7]->path = 'v1644026824/ouachita-mountains/2018-11-16_18.19.33_zyj8dj.jpg';

    $photos[8] = new Photo;
    $photos[8]->path = 'v1644026821/ouachita-mountains/2018-11-16_18.18.22_hey7vo.jpg';
    
    $photos[9] = new Photo;
    $photos[9]->path = 'v1644026825/ouachita-mountains/2018-11-16_18.19.12_e751c9.jpg';
    
    $photos[10] = new Photo;
    $photos[10]->path = 'v1644026822/ouachita-mountains/2018-11-16_18.19.20_s4sptt.jpg';



?>



<?php 

    PhotoList($photos);

?>