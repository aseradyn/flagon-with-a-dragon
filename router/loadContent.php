<?php 

function loadPage($path) {
    include($_SERVER["DOCUMENT_ROOT"]."/pages/".$path.".php");
}

function loadArticle($fileName) {

    include_once $_SERVER["DOCUMENT_ROOT"]."/utilities/php-markdown-extra/markdown.php";
    $markdown = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/pages".$fileName.".md");
    $my_html = Markdown($markdown);

    ?>
    
    <article class='single-column-layout'>
        <?php echo $my_html ?>
    </article>
    
    <?php
}

?>