<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/utilities/markdown/index.php";

    $reedBaskets_file = file_get_contents("reed-baskets.md", "r");
    $reedBaskets = processMarkdown($terminology_file);
?>

<aside>
    <?php echo $reedBaskets ?>
</aside>
