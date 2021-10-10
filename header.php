<?php 

    $useDarkMode = false;
    if (isset($_COOKIE["useDarkMode"])) {
        if ($_COOKIE["useDarkMode"] == "false") {
            $useDarkMode = false;
        } else {
            $useDarkMode = true;
        }
    } else {
        $useDarkMode = true;
    }
    if (isset($_GET['useDarkMode'])) {
        if ($_GET['useDarkMode'] == "true") {
            setCookie("useDarkMode", "true", 0, "/");
            $useDarkMode = true;
        } else if ($_GET['useDarkMode'] == "false") {
            setCookie("useDarkMode", "false", 0, "/");
            $useDarkMode = false;
        }
    }

    // Utilities
    include_once "utilities/markdown/index.php";

    include_once 'theme/colors.php';

    // Components
    include_once 'components/icon.php';
    include_once "components/breadcrumbs.php";
    include_once "components/article-basic.php";
?>

<html>

<!-- 
    Hand-crafted artisinal code right here, lads!
    ... 
    ...
    ...
    Nah, I'm screwing with you. Nothing here but compiled mayhem.

    If you really want to snoop on the code, it's in a public repo
    https://github.com/aseradyn/flagon-with-a-dragon
-->

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php include_once 'theme/baseStyles.php'; ?>

    <script>

<?php include_once 'utilities/cookies.js'; ?>

function setDarkMode(newState) {
    if (newState == true) {
        window.location.href = window.location.pathname+"?"+"useDarkMode=true";
    } else {
        window.location.href = window.location.pathname+"?"+"useDarkMode=false";
    }
}

const detectDarkMode = () => {
    const preferDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const preferLightMode = window.matchMedia('(prefers-color-scheme: light)').matches;
    const _darkModeCookie = getCookie("useDarkMode");

    // if they don't have a proper darkModeCookie
    // Note: PHP will check the cookie and then the query string
    // This should only do anything IFF the cookie is missing by the time this script executes
    if (_darkModeCookie !== "true" && _darkModeCookie !== "false") {
        // and their OS is set to dark mode
        if (preferDarkMode) {
            // use dark mode
            setDarkMode(true);
        }
        if (preferLightMode) {
            setDarkMode(false);
        }
    }
}

</script>
</head>

<body onload="detectDarkMode()">

<style>
    #page {
        min-height: 100vh;
        display: grid;
        grid-template-rows: auto 5em;
    }
    #header-bar {
        position: sticky;
        top: 0px;
        border-bottom: 1px solid <?php echo $useDarkMode ? $primary[400] : $primary[200] ?>;
        background-color: <?php echo $useDarkMode ? $gray[700] : $primary[100] ?>;
        color: <?php echo $useDarkMode ? $primary[300] : $primary[500] ?>;
        padding: 5px;
        box-shadow: 0px 5px 10px <?php echo $useDarkMode ? $primary[400] : $primary[500] ?>;
    }

    #header-layout {
        padding: 5px 15px;
        display: grid;
        grid-template-columns: 12em auto 10em;
        align-items: center;
    }
    #header-layout .quip-wrapper {
            justify-self: end;
    }
    #header-layout .quip {
        font-size: 0.9em;
        @media only screen and (max-width: 650px) {
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
        color: <?php echo $useDarkMode ? $primary[300] : $primary[500] ?>;
        border: 1px solid <?php echo $useDarkMode ? $gray[700] : $primary[100]?>;
        border-radius: 20px;
        padding: 5px;
    }
    #color-mode-control > a > span:hover {
        background-color: <?php echo $useDarkMode ? "rgb(255, 255, 255, 0.1)" : $primary[200]."80" ?>;

    }
    #color-mode-control > a > span.selected {
        border: 1px solid <?php echo $useDarkMode ? $primary[300] : $primary[500]?>;
    }
    #page-content {
        padding: 20px;
    }

</style>

<div id="page">
    <div id="top-wrapper">
        <div id="header-bar">
            <div id="header-layout">
                <div style="justify-self: start; font-family: 'SteelworksVintageDemo'; font-size: 2em">
                    Jill.Menning
                </div>
                <span className="quip-wrapper">
                    <div className="quip">
                        Serial hobbyist. Plotter and schemer.
                    </div>
                </span>
                <div id="color-mode-control">
                    <a href='javascript:setDarkMode(true)'>
                        <?php $useDarkMode ? Icon("dark_mode", "selected") : Icon("dark_mode"); ?>
                    </a>
                    <a href='javascript:setDarkMode(false)'>
                        <?php $useDarkMode ? Icon("light_mode") : Icon("light_mode", "selected"); ?>
                    </a>
                </div>
            </div>
        </div>
        <div id="page-content">