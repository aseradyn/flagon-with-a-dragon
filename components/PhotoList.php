<?php

    // TODO: Get resized images from Cloudinary
    // TODO: Add basic lightbox

    include_once($_SERVER["DOCUMENT_ROOT"]."/components/Photo.php");

    function PhotoList($photos) {
        ?>

        <div class="photoList">

        <?php
        foreach ($photos as $photo) {
            
            $rotation = rand(-2,2);
        ?>    

            <div class="photoList-card" style="transform: rotate(<?php echo $rotation ?>deg)">
                <?php Photo($photo) ?>
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
</style>