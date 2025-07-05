<div>
<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/utilities/parsedown/index.php";

include_once $_SERVER["DOCUMENT_ROOT"]."/utilities/fetchEphemera.php";

$list = fetchEphemera();
                    
foreach($list as $post)
{
    $dateStartPosition = strpos($post, "ephemera/") + 9;
    $postDate = substr($post, $dateStartPosition, 10);

    $markdown = file_get_contents($post);

    $Parsedown = new Parsedown();
    echo "<div class='ephemera-post'>";
    echo "<p>";
    echo $postDate;
    echo "</p>";
    echo $Parsedown->text($markdown);
    echo "</div>";
}

?>
</div>

<style>
    .ephemera-post:not(:last-child) {
        border-bottom: 1px dashed var(--decoration);
        margin-bottom: 10px;
    }
</style>