<?php

function ArticleCard(array $page) {

    $title = $page["title"];
    $description = $page["description"];
    $link = $page["link"];

    echo "  <p class='card'>
            <span class='topic-title'>$title</span>
            <br />$description
            <br /><a href='$link' title='Read $title'>Read it</a>
            </p>
        ";
}

?>