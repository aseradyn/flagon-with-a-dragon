<div>
<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/utilities/parsedown/index.php";

$list = glob($_SERVER["DOCUMENT_ROOT"].'/pages/ephemera/*.md');
$list = array_reverse($list);
$limit=5; 
$list=array_slice($list, 0, $limit);                    
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
        border-bottom: 1px dashed var(--coral);
        margin-bottom: 10px;
    }
</style>