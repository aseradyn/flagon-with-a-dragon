<?php include $_SERVER["DOCUMENT_ROOT"]."/components/article-card.php" ?>
<style>
.category-card-layout {
    display: grid;
    gap: 2em;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
}

</style>
<div class="single-column-layout">
    <h1>Web Development</h1>

    <?php 
        require "web-development-pages.php";
        echo "<div class='category-card-layout'>";
        foreach ($webDevelopmentPages as $page) {
            ArticleCard($page);
        }
        echo "</div>";
    ?>

</div>