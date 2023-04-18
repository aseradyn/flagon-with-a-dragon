<?php

include_once("Photo.php");

function rssFeedComplete($url, $limit) {
    $rss_feed = simplexml_load_file($url);
    if (! empty($rss_feed)) {
        $i = 0;
        foreach ($rss_feed->channel->item as $feed_item) {
            if ($i >= $limit)
                break;
            ?>
            <div class="feed-item">
                <?php 
                $date = new DateTimeImmutable($feed_item->pubDate);
                $formattedDate = $date->format('Y.m.d');
                echo "$formattedDate<br />$feed_item->description";

                $media = $feed_item->children('media', True);

                foreach($media as $item) {
                    $description = $item->description;
                    $image = $item->attributes();
                    if ($image) {
                        switch($image->medium) {
                            case "image":
                                echo "<img src=$image->url alt='$description' class='photo-card' style='width: calc(100% - 40px); margin-bottom: 20px' />";
                                break;
                            case "video":
                                echo "<video class='photo-card' style='width: calc(100% - 40px); margin-bottom: 20px' controls><source src='$image->url' type='video/mp4' /></video>";
                                break;
                        }
                    }
                }
                
                
                
                ?>
            </div>
            
            <?php  
            $i ++;
        }
    }
}

?>

<style>
    .feed-item:first-of-type {
        padding-top: 10px;
    }
    .feed-item:not(:last-child) {
        border-bottom: 1px solid black;
        margin-bottom: 10px;
    }
</style>