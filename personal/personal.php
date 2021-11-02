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

    include_once "../components/article-card.php";
    include "personal-pages.php";

?>

<h1>A Big Pile of Nonsense</h1>

<div class="personal-layout">

    <div id="left-column">
        <h2>Photography</h2>

        <?php
            foreach ($photoPages as $page) {
                ArticleCard($page);
            }
        ?>
    </div id="left-column">

</div id="personal-layout">