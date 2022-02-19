<div class="single-column-layout">
    <h1>A Collection of Watercolor Doodles</h1>
<p>
Over Christmas, I got hooked on watercolors - first pencils, then pan paints. I am not much of an artist, but it's sure fun 
to fool around with them, and it's turned out to be a great way to keep my hands busy while my brain is processing data. Here's 
a quick little gallery of my favorite sketches and doodles.
</p>

</div>

<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/components/PhotoGallery.php");

$photos = array();

$photo = new Photo;
$photo->path = 'v1645238281/painting/20220210_082628_an3ilb.jpg';
$photos[] = $photo;

$photo = new Photo;
$photo->path = 'v1645238238/painting/20220211_094243_w2g9t6.jpg';
$photos[] = $photo;

$photo = new Photo;
$photo->path = 'v1645238231/painting/20220217_142409_wso2ml.jpg';
$photos[] = $photo;

$photo = new Photo;
$photo->path = 'v1645238261/painting/20211231_203659_ymeql0.jpg';
$photos[] = $photo;

$photo = new Photo;
$photo->path = 'v1645238318/painting/20211226_143555_fgyyfu.jpg';
$photos[] = $photo;

$photo = new Photo;
$photo->path = 'v1645238322/painting/20211226_143613_jqgigb.jpg';
$photos[] = $photo;

$photo = new Photo;
$photo->path = 'v1645238325/painting/20211226_143628_jamsbl.jpg';
$photos[] = $photo;

$photo = new Photo;
$photo->path = 'v1645238328/painting/20211226_143729_yd9cn9.jpg';
$photos[] = $photo;

$photo = new Photo;
$photo->path = 'v1645238330/painting/20211226_143755_ki5dfm.jpg';
$photos[] = $photo;

$photo = new Photo;
$photo->path = 'v1645238344/painting/20211226_193451_oaq4lu.jpg';
$photos[] = $photo;

PhotoList($photos);

?>

