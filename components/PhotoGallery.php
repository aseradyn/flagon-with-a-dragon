<?php

    include_once($_SERVER["DOCUMENT_ROOT"]."/components/Photo.php");

    function PhotoList($photos) {
        ?>

        <script>
            function showLightbox(key) {
                event.preventDefault();
                document.getElementById(key).classList.remove("hide");
            }
            function hideLightbox(key) {
                event.preventDefault();
                document.getElementById(key).classList.add("hide");
            }
        </script>

        <div class="photoList">

        <?php
        foreach ($photos as $key => $photo) {
            
            $rotation = rand(-2,2);

        ?>    

        

        <a href="/photos/singlePhoto?path=<?php echo $photo->path ?>" onClick=showLightbox(<?php echo $key ?>)>
            <div class="photoList-card" style="transform: rotate(<?php echo $rotation ?>deg)">
                <?php Photo(photo: $photo, type: "thumbnail") ?>
            </div>
        </a>

        <div id=<?php echo $key ?> class="lightbox-overlay hide" onClick=hideLightbox(<?php echo $key ?>)>
            <div class="lightbox-positioning">
                <div class="lightbox photo-card">
                        <?php 
                            Photo(photo: $photo, type: "lightbox") 
                        ?>
                    <div class="lightbox-caption">
                        <?php 
                            echo $photo->caption 
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
        }

        ?>
        
        </div>

        <?php
    }

?>

<style>
    .photoList {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        justify-content: center;
        align-items: center;
        margin-top: 40px;

    }
    .photoList-card {
        max-width: 350px;
    }
    .lightbox-overlay {
        position: fixed;
        top: 0px;
        left: 0px;
        margin: 0px;
        padding: 0px;
        z-index: 10;
        width: 100%;
        height: 100%;
        background-color: rgb(0,0,0,0.5);
    }
    .hide {
        display: none;
    }
    .lightbox-positioning {
        display: grid;
        width: 100%;
        height: 100%;
        align-items: center;
        justify-items: center;
    }
    .lightbox {
        max-height: 100vh;
    }
    .lightbox img {
        max-height: 80vh;
    }
    .lightbox-caption {
        max-width: 800px;
        padding: 10px;
        color: black;
    }
</style>