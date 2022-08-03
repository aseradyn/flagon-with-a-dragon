<?php 

function loadPage($path) {
    include($_SERVER["DOCUMENT_ROOT"]."/pages/".$path.".php");
}

function loadArticle($fileName) {

    ?>

    <!-- code highlighting -->
    <style>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/theme/highlightjsTheme.css" ?>
    </style>
    <script src="/utilities/highlightjs/highlight.min.js"></script>
    <script src="/utilities/highlightjs/php.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((el) => {
                hljs.highlightElement(el);
            });
        });
    </script>

    <?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/utilities/parsedown/index.php";
    $Parsedown = new Parsedown();

    $markdown = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/pages".$fileName.".md");
   

    //$markdown = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/pages".$fileName.".md");
    // $my_html = Markdown($markdown);

    ?>
    <div class="single-column-layout markdown">
        <article>
            <?php echo $Parsedown->text($markdown) ?>
        </article>
    </div>
    
    <?php
}

?>