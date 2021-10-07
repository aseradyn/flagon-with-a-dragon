<?php

    $terminology = processMarkdown("terminology.md");
    $choosing = processMarkdown("choosing-a-spindle.md");
?>

<aside>
    <?php echo $terminology ?>
</aside>

<article class="article-contents">
    <?php echo $choosing ?>
</article>