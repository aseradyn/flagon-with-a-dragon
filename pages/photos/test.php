<?php

function CallSmugMug($url)
{
    $config = '../configurations/smugmug.php';
    include($config);

    $apiBase = "https://api.smugmug.com";
    $url = $apiBase . $url;

    if (str_contains($url, "?")) {
        $url = $url . "&APIKey=" . $SMUG_KEY;
    } else {
        $url = $url . "?APIKey=" . $SMUG_KEY;
    }

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Accept: application/json'
    ]);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

$albums = json_decode(CallSmugMug("/api/v2/user/jillmenning!albums"));

$response = $albums->Response->Album;
$gallery = $response[0];
$albumKey = $gallery->AlbumKey;
$name = $gallery->Name;
$uri = $gallery->Uri;

$highlightImageInfo = json_decode(CallSmugMug("/api/v2/album/$albumKey!highlightimage"));
$highlightImage = $highlightImageInfo->Response->AlbumImage->ThumbnailUrl;
$height = $highlightImageInfo->Response->AlbumImage->OriginalHeight;
$width = $highlightImageInfo->Response->AlbumImage->OriginalWidth;

$images = json_decode(CallSmugMug("/api/v2/album/$albumKey!images"));
$image = $images->Response->AlbumImage[0];

$imageKey = $image->ImageKey;
$imageCustomSize = json_decode(CallSmugMug("/api/v2/image/$imageKey-0!sizecustom?height=300&width=400"))->Response->ImageSizeCustom->Url;

?>

<pre>
    <?php
        print_r($response);
    ?>
</pre>

<h1><?php echo $name ?></h1>
<img style="width: 400px; aspect-ratio: <?php echo $width ?> / <?php echo $height ?>" src="<?php echo $imageCustomSize ?>" />