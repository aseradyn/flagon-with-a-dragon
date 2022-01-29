
<?php

    class Photo {
        public $path;
        public $alt = "";
        public $caption = "";
    }

    function Photo($photo) {

        echo "<div class='photo-card'>";
        echo "<img src='$photo->path' alt='$photo->alt' title='$photo->caption' />";
        echo "</div>";

    }

?>

<style>
    .photo-card {
        background-color: white;
        background-image: url("/theme/images/linen.png");
        padding: 20px;
        max-width: 100%;
        box-shadow: 0px 0px 5px rgb(0,0,0,0.5);
    }
    .photo-card img {
        width: 100%;
    }
</style>