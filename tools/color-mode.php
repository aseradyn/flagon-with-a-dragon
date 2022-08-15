
<?php
    session_start();

    include_once($_SERVER["DOCUMENT_ROOT"]."/components/color-mode-switcher.php");

    $mode = $_POST["mode"];
    $redirectURL = $_POST["redirectURL"];

    if (isset($mode) && ($mode == "night" || $mode == "day")) {
        $_SESSION["mode"] = $mode;
        if (isset($_POST["redirectURL"])) {
            header('Location: '. $redirectURL);
        } else {
            header('Location: '. $_SERVER["DOCUMENT_ROOT"]);
        }
        
    }

?>