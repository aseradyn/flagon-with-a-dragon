<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/utilities/markdown/index.php";

    $terminology_file = file_get_contents("terminology.md", "r");
    $terminology = processMarkdown($terminology_file);

    $choosing_file = file_get_contents("choosing-a-spindle.md", "r");
    $choosing = processMarkdown($choosing_file);
?>

<aside>
    <?php echo $terminology ?>
</aside>

<article class="article-contents">
    <?php echo $choosing ?>
</article>