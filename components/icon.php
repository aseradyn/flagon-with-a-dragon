<?php 

function Icon (string $name, string $classes = "", string $styles = "") {
    ?>
    <span 
        class="material-icons <?php echo $classes ?>" 
        style="<?php echo $styles ?>"
    >
        <?php echo $name ?>
    </span>
<?php
}

?>