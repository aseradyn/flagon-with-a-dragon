<style>
    .article-card {
        display: grid;
        gap: 1rem;
        grid-template-rows: 1fr 3fr 1fr;
    }
    .topic-title {
        font-weight: bold;
    }
</style>

<?php

function ArticleCard(array $page) {

    $title = $page["title"];
    $description = $page["description"];
    $link = $page["link"];

    echo "  <div class='card article-card'>
            <span class='topic-title'>$title</span>
            <span class='topic-description'>$description</span>
            <span class='topic-link'><a href='$link' title='Read $title'>Read it</a></span>
            </div>
        ";
}

?>