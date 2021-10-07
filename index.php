<?php 

    include_once 'theme/colors.php';

    // TODO: Add dark mode logic
    $useDarkMode = false;

?>

<html>
    <head>
        <style>
            .card {
                padding: 10px;
                background-color: <?php echo $useDarkMode ? "inherit" : $primary['100'] ?>;
                border: 1px solid <?php echo $useDarkMode ? $primary['400'] : $primary['300'] ?>;
                max-width: 50em;

                h1, h2 {
                    margin-top: 0px;
                }
            }
        </style>

    </head>
    <body>
    


    <?php

        $request = $_SERVER['REQUEST_URI'];

        switch ($request) {
            case '/' :
                require __DIR__ . '/home.php';
                break;
            case '' :
                require __DIR__ . '/home.php';
                break;
            case "/credits":
                require __DIR__ . '/credits.php';
                break;
            case '/hobbies/spinning/cotton/spindles/' :
                require __DIR__ . "/content" . $request . 'index.php';
                break;
            default:
                http_response_code(404);
                require __DIR__ . '/404.php';
                break;
        }

    ?>

    </body>
</html>