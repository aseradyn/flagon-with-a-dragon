<?php
    header("Content-Type: application/rss+xml; charset=UTF-8");
    include_once $_SERVER["DOCUMENT_ROOT"]."/utilities/fetchEphemera.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/utilities/parsedown/index.php";

    $list = fetchEphemera();
    $date = date(DATE_RFC2822);
?>

<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
    <channel>
        <title>Jill Menning: Ephemera</title>
        <link>https://www.jmenning.com</link>
        <description>The latest ephemera</description>
        <language>en-us</language>
        <pubDate><?= $date ?></pubDate>
        <atom:link href="https://www.jmenning.com/ephemera/rss.php" rel="self" type="application/rss+xml"/>

        <?php

            foreach($list as $post) {
                $Parsedown = new Parsedown();
                $markdown = file_get_contents($post);
                $content = $Parsedown->text($markdown);
                $encodedContent = htmlentities($content, ENT_COMPAT);

                $dateStartPosition = strpos($post, "ephemera/") + 9;
                $postDate = substr($post, $dateStartPosition, 10);
                $dateYear = substr($postDate, 0, 4);
                $dateMonth = substr($postDate, 5, 2);
                $dateDay = substr($postDate, 8, 2);
                $publishDate = date(DATE_RFC2822, mktime(0,0,0,$dateMonth, $dateDay, $dateYear));
                
                $fileName = substr($post, $dateStartPosition);
                $clippedFileName = substr($fileName, 0, -3);
                $url = "https://www.jmenning.com/ephemera/$clippedFileName";

                echo "
                    <item>
                        <pubDate>$publishDate</pubDate>
                        <description>$encodedContent</description>
                        <link>$url</link>
                    </item>
                ";
            }

        ?>

    </channel>
</rss>

