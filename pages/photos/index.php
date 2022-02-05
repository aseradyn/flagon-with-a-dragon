<h1>Photos</h1>
<p style="text-align: center;">Some of the coolest things I've seen when I had a camera handy</p>

<?php

    include_once($_SERVER["DOCUMENT_ROOT"]."/components/PhotoDirectory.php");

    $pages = array();

    $pages[0] = new Page;
    $pages[0]->title = "The Grand Canyon";
    $pages[0]->link = "/photos/grand-canyon";
    $pages[0]->photo = new Photo;
    $pages[0]->photo->path="v1643291888/grand-canyon/PC220219_uxhdo7.jpg";

    $pages[1] = new Page;
    $pages[1]->title = "Ouachita Mountains";
    $pages[1]->link = "/photos/ouachita-mountains";
    $pages[1]->photo = new Photo;
    $pages[1]->photo->path="v1644026821/ouachita-mountains/2018-11-13_09.41.44_o5vw8e.jpg";

    PhotoDirectory($pages);

?>


