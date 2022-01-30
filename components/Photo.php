
<?php

    class Photo {
        public $path;
        public $alt = "";
        public $caption = "";
    }

    

    function Photo($photo, $type="inline") {

        $baseCloudinaryURL = "https://res.cloudinary.com/aseradyn/image/upload";

        $maxWidth = 500;
        
        switch($type) {
            case "thumbnail":
                $maxWidth = 350;
                break;
            case "lightbox":
            case "fullSize":
                $maxWidth = 1000;
                break; 
            case "inline":
            default:
                $maxWidth = 500;
        }

        $photoClass = "photo-card";
        if ($type == "lightbox") {
            $photoClass = "";
        }

        echo "<div class='$photoClass'>";
        echo "<img src='$baseCloudinaryURL/w_$maxWidth/$photo->path' alt='$photo->alt' title='$photo->caption' />";
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