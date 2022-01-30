<?php

    // TODO: Get resized images from Cloudinary

    include_once($_SERVER["DOCUMENT_ROOT"]."/components/Photo.php");

    class Page {
        public $link;
        public $title;
        public $photo;
    }

    function PhotoDirectory($pages) {
        ?>

        <div class="photoDirectory">

        <?php
        foreach ($pages as $page) {

            $rotation = rand(-2,2);
        ?>    
            <a href="<?php echo $page->link ?>">
                <div class="photoDirectory-card-wrapper" style="transform: rotate(<?php echo $rotation ?>deg)">
                    <div>
                       <?php echo Photo($page->photo, "thumbnail"); ?>
                    </div>
                    <div class="photoDirectory-caption"><?php echo $page->title ?></div>
                </div>
            </a>

            <?php
        }

        ?>
        
        </div>

        <?php
    }

?>

<style>
    .photoDirectory {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: -6px;
        width: 90vw;
        margin-left: auto;
        margin-right: auto;
        margin-top: 40px;

    }
    .photoDirectory-card-wrapper {
        width: fit-content;
        max-width: 350px;
        display: grid;
    }

    .photoDirectory-card-wrapper > * {
        grid-area: 1 / -1;
        align-self: center;
        justify-self: center;
    }
    .photoDirectory-caption {
        font-weight: bold;
        font-size: 1.5em;
        width: calc(100% - 40px);
        padding: 10px;
        background-color: rgb(0,0,0,0.5);
        text-align: center;
    }
    .photoDirectory a,
    .photoDirectory a:visited {
        color: white;
        text-decoration: none;
    }
</style>