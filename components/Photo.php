
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
        string $type="inline",
        bool $local=false
        ) {

        $baseCloudinaryURL = "https://res.cloudinary.com/aseradyn/image/upload";

        $maxWidth = match($type) {
            "thumbnail" => 350,
            "inline" => 500,
            "lightbox", "fullSize" => 1000,
            
        };

        // styles are in photos.css
        $photoClass = "photo-card";
        if ($type == "lightbox") {
            $photoClass = "";
        }

        echo "<div class='$photoClass'>";

        if ($local == true) {
            echo "<img src='$photo->path' alt='$photo->alt' title='$photo->caption' />";
        } 
        else {
            echo "<img src='$baseCloudinaryURL/w_$maxWidth/$photo->path' alt='$photo->alt' title='$photo->caption' />";
        }

        echo "</div>";

    }

?>