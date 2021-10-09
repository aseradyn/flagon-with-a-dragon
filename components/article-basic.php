<?php

    function BasicArticle($fileName = "") {

        if (!$fileName) {
            $fileName = "index.md";
        }

        $html = processMarkdown("$fileName");
        echo "<article>".$html."</article>";

    }

?>