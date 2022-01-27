<?php

    class Photo {
        public $path;
        public $alt;
        public $caption;
    }

    function PhotoList($photos) {
        ?>

        <div class="photoList">

        <?php
        foreach ($photos as $photo) {

            $rotation = rand(-2,2);
        ?>    

            <div class="photoList-card" style="transform: rotate(<?php echo $rotation ?>deg)">
                <img src="<?php echo $photo->path ?>" title="<?php echo $photo->caption ?>" alt="<?php echo $photo->alt ?>" />
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