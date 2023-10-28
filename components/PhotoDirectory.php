<?php

    include_once($_SERVER["DOCUMENT_ROOT"]."/components/Photo.php");

    class Page {
        public $link;
        public $title;
        public $photo;
    }

    function PhotoDirectory($pages) {
        
        ?>
        
        <link rel="stylesheet" type="text/css" href="/theme/animation.css" />
        <link rel="stylesheet" type="text/css" href="/components/PhotoDirectory.css" />

        <div class="photoDirectory">

        <?php

        $animationDelay = 0.5;

        foreach ($pages as $page) {

            $animationDelayStyle = "animation-delay: ".$animationDelay."s";
            $rotation = rand(-2,2);

        ?>    
            <a href="<?php echo $page->link ?>">
                <div class="photoDirectory-card-wrapper animate pop" style="transform: rotate(<?php echo $rotation ?>deg); <?php echo $animationDelayStyle ?>">
                    <div>
                       <?php 
                            echo Photo(
                                    photo: $page->photo,
                                    type: "thumbnail"
                            ); 
                        ?>
                    </div>
                    <div class="photoDirectory-caption"><?php echo $page->title ?></div>
                </div>
            </a>

            <?php
            $animationDelay = $animationDelay + 0.1;
        }


        ?>
        
        </div>

        <?php
    }

?>