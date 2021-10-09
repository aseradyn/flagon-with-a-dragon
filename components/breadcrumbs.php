<?php 

// $pathLinks should be in the form [{name: name, path: path}];
function Breadcrumbs() {

    $primary = $GLOBALS['primary'];

    $sitePaths = array(
        array(
            // empty to prevent $key == 0
            'name' => '',
            'path' => ''
        ),
        array(
            'name' => 'Professional Life',
            'path' => 'professional'
        ),
        array(
            'name' => 'Hobbies',
            'path' => 'hobbies'
        ), 
        array(
            'name' => 'Spinning',
            'path' => 'spinning'
        ),
        array(
            'name' => 'Baskets',
            'path' => 'reed-baskets'
        )
    );

    $request = $_SERVER['REQUEST_URI'];
    $wholePath = parse_url($request, PHP_URL_PATH);
    $wholePath = ltrim($wholePath, '/');
    $wholePath = rtrim($wholePath, '/');
    $pathPieces = explode("/", $wholePath);

    // set up the dots
    $linkDots = "";
    $length = count($pathPieces);
    for ($x = 0; $x <= $length; $x++) {
        $linkDots .= "../";
      } 
    
    // set up the segments
    $linkSegments = "";

    ?>
        <style>
        .breadcrumbs-container {
            font-size: 0.8em;
            display: grid;
            grid-template-columns: 2em auto;
            align-items: center;
            margin-bottom: 10px;
        }
        .breadcrumbs-separator {
            margin-left: 10px;
            margin-right: 10px;
        }
    </style>

        <div class="breadcrumbs-container">
            <a href="/" style="color: <?php echo $primary[400] ?>">
                <?php Icon("home", "", "font-size: 20px") ?>
            </a>
            <span>
                <?php

                $count = 0;
                foreach ($pathPieces as $piece) {

                    // Get info from the array
                    $key = array_search($piece, array_column($sitePaths, 'path'));
                    if ($key > 0) {
                        $pathArray = $sitePaths[$key];
                        $name = $pathArray['name'];
                    } else {
                        $name = $piece;
                    }

                    // Set up link paths
                    if ($count == 0) {
                        $linkSegments = $piece;
                    } else {
                        $linkDots = substr($linkDots, 0, -3); // trim a layer off
                        $linkSegments .= "/".$piece; // add a layer on
                    }

                    $linkPath = $linkDots.$linkSegments;

                    $count++;

                    // Last piece
                    if ($count == $length) {
                        echo "<span class='breadcrumbs-separator'>/</span><b>$name</b>";
                    } else {
                        echo "<span class='breadcrumbs-separator'>/</span><a href='$linkPath' >$name</a>";
                    }
                }
                ?>
            </span>
        </div>

    <?php
}

?>