
<?php

    class Photo {
        public string $path;
        public string $alt = "";
        public string $caption = "";
    }

    
    /**
	 * @param "inline" | "thumbnail" | "lightbox" | "fullSize" $type
	 */
    function Photo(
        Photo $photo, 
        string $type="inline"
        ) {

        $baseCloudinaryURL = "https://res.cloudinary.com/aseradyn/image/upload";

        $maxWidth = match($type) {
            "thumbnail" => 350,
            "inline" => 500,
            "lightbox", "fullSize" => 1000,
            
        };

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