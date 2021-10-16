<style>

    .personal-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;

        @media only screen and (max-width: 950px) {
            grid-template-columns: auto;
        }
    }

    .card {
        max-width: 40em;
    }

    .topic-title {
        font-weight: 700;
    }
</style>

<?php

    function render(array $page) {

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

    include "personal-pages.php";

?>

<h1>A Big Pile of Nonsense</h1>

<h2>Web Development</h2>

<?php 

    foreach ($webDevelopmentPages as $page) {
        render($page);
    }

?>
