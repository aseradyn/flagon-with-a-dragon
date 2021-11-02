<!-- 
    Hand-crafted artisinal code right here, lads!


    If you want to see how it is built, it's in a public repo:
    https://github.com/aseradyn/flagon-with-a-dragon
-->

<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/theme/baseStyles.css" rel="stylesheet">

<script>

    <?php 
        include_once 'utilities/cookies.js'; 
        include_once 'components/icon.php';
    ?>

    const detectDarkMode = () => {
        const _darkModeCookie = getCookie("useDarkMode");
        const _preferDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        // if they have a dark mode cookie or their OS is set to dark mode, turn off the lights
        if (_darkModeCookie === "true" || _preferDarkMode) {
            // apply the dark mode styles
            document.querySelector('body').classList.add('dark-mode');
            // highlight the right icon in the mode control
            document.querySelector('#use-dark-mode').classList.add('selected');
        } else {
            // use light mode
            // highlight the right icon in the mode control
            const lightClasses = document.querySelector('#use-light-mode').classList;
            document.querySelector('#use-light-mode').classList.add('selected');
        }
    }

    // value = boolean; true = turn on dark mode; false = turn on light mode
    // TODO: Is it worth coming up with a control to delete the cookie?
    const setDarkMode = (value) => {
        // set the cookies and toggle the body class
        if (value == true) {
            document.cookie = "useDarkMode=true;path=/";
            document.querySelector('body').classList.add('dark-mode');
            document.querySelector('#use-dark-mode').classList.add('selected');
            document.querySelector('#use-light-mode').classList.remove('selected');
        }
        if (value == false) {
            document.cookie = "useDarkMode=false;path=/";
            document.querySelector('body').classList.remove('dark-mode');
            document.querySelector('#use-dark-mode').classList.remove('selected');
            document.querySelector('#use-light-mode').classList.add('selected');
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
                <span className="quip-wrapper">
                    <div className="quip">
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