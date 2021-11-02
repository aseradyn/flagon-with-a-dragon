<?php 

function Icon (string $name, string $classes = "", string $styles = "") {

    echo "  <span class='material-icons $classes' style='$styles'>
                $name
            </span> 
    ";
}

?>