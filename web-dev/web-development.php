<?php include $_SERVER["DOCUMENT_ROOT"]."/components/article-card.php" ?>

<div class="single-column-layout">
    <h1>Web Development</h1>

    <?php 
        require "web-development-pages.php";
        foreach ($webDevelopmentPages as $page) {
            ArticleCard($page);
        }
    ?>

</div>