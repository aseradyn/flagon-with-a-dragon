<!-- 
    Hand-crafted artisinal code right here, folks!


    If you want to see how it is built, it's in a public repo:
    https://github.com/aseradyn/flagon-with-a-dragon
-->

<?php 
    $useDarkMode = false;
    if(!isset($_COOKIE["useDarkMode"])) {
        if ($_COOKIE["useDarkMode"] == "true") {
            $useDarkMode = true;
        }
    }
?>

<html <?php if ($useDarkMode) { echo "class='dark-mode'"; } ?>>

<head>
    <title>Jill Menning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/theme/baseStyles.css" rel="stylesheet">

    <?php 
        include_once 'components/icon.php';

        
    ?>

<script>

    <?php 
        include_once 'utilities/cookies.js';
    ?>

    const detectDarkMode = () => {
        const _darkModeCookie = getCookie("useDarkMode");
        if (_darkModeCookie === "true") {
            // highlight the right icon in the mode control
            document.querySelector('#use-dark-mode').classList.add('selected');
        } else {
            document.querySelector('#use-light-mode').classList.add('selected');
        }
    }

    // value = boolean; true = turn on dark mode; false = turn on light mode
    const setDarkMode = (value) => {
        // set the cookies and toggle the body class
        if (value == true) {
            document.cookie = "useDarkMode=true;path=/";
            document.querySelector('html').classList.add('dark-mode');
            document.querySelector('#use-dark-mode').classList.add('selected');
            document.querySelector('#use-light-mode').classList.remove('selected');
        }
        if (value == false) {
            document.cookie = "useDarkMode=false;path=/";
            document.querySelector('html').classList.remove('dark-mode');
            document.querySelector('#use-dark-mode').classList.remove('selected');
            document.querySelector('#use-light-mode').classList.add('selected');
        }
    }

</script>

</head>

<body onload="detectDarkMode()" >

<style>
    #page {
        min-height: 100vh;
        display: grid;
        grid-template-rows: auto 5em;
    }
    #header-bar {
        position: sticky;
        top: 0px;
        border-bottom: 1px solid var(--primary200);
        background-color: var(--primary100);
        color: var(--primary400);
        padding: 5px;
        box-shadow: 0px 5px 10px var(--primary500);
    }
    .dark-mode #header-bar {
        border-bottom-color: var(--primary400);
        background-color: var(--gray700);
        color: var(--primary300);
        box-shadow: 0px 5px 10px var(--primary400);
    }

    #header-layout {
        padding: 5px 15px;
        display: grid;
        grid-template-columns: 12em auto 10em;
        align-items: center;
    }
    @media screen and (max-width: 500px) {
        #header-layout {
            grid-template-columns: 12em 1fr;
        }
    }
    #header-layout a {
        text-decoration: none;
        color: var(--primary500);
    }
    .dark-mode #header-layout a {
        color: var(--primary300);
    }

    #header-layout .quip-wrapper {
        justify-self: end;
    }
    #header-layout .quip {
        font-size: 0.9em;
    }
    @media screen and (max-width: 500px) {
        #header-layout .quip-wrapper {
            display: none;
        }
    }
    #color-mode-control {
        justify-self: end;
        cursor: pointer;
        display: grid;
        grid-template-columns: 1fr 1fr;
        column-gap: 10px;
    }

    #color-mode-control > a > span {
        color: var(--primary500);
        border: 1px solid var(--primary100);
        border-radius: 20px;
        padding: 5px;
    }
    .dark-mode #color-mode-control > a > span {
        color: var(--primary300);
        border-color: var(--gray700);
    }

    #color-mode-control > a > span:hover {
        background-color: var(--primary20080);
    }
    .dark-mode #color-mode-control > a > span:hover {
        background-color: rgb(255, 255, 255, 0.1);
    }
    #color-mode-control > a.selected > span {
        border: 1px solid var(--primary500);
    }
    #color-mode-control > a.selected > span {
        border-color: var(--primary300);
    }
    #page-content {
        padding: 20px;
    }
    @media screen and (max-width: 500px) {
        #page-content {
            padding-left: 10px;
            padding-right: 10px;
        }
    }

</style>

<div id="page">
    <div id="top-wrapper">
        <div id="header-bar">
            <div id="header-layout">
                <a href="/">
                    <div style="justify-self: start; font-family: 'SteelworksVintageDemo'; font-size: 2em">
                        Jill.Menning
                    </div>
                </a>
                <span class="quip-wrapper">
                    <div class="quip">
                        Serial hobbyist. Plotter and schemer.
                    </div>
                </span>
                <div id="color-mode-control">
                    <a href='javascript:setDarkMode(true)' id="use-dark-mode" alt="Enable dark mode" title="Enable dark mode">
                        <?php Icon("dark_mode") ?>
                    </a>
                    <a href='javascript:setDarkMode(false)' id="use-light-mode" alt="Enable light mode" title="Enable light mode">
                        <?php Icon("light_mode") ?>
                    </a>
                </div>
            </div>
        </div>
        <div id="page-content">