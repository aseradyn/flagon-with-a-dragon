<?php 



function Breadcrumbs(string $currentPageName) {
include $_SERVER["DOCUMENT_ROOT"]."/theme/colors.php";

    ?>
        <style>
            .breadcrumbs-container {
                font-size: 0.8em;
                display: grid;
                grid-template-columns: 2em auto;
                align-items: center;
                margin-bottom: 10px;
            }
        </style>

        <div class="breadcrumbs-container">
            <a href="/" style="color: <?php echo $primary[400] ?>">
                <?php Icon("home", "", "font-size: 20px") ?>
            </a>
            <span>&nbsp; / &nbsp; <b><?php echo $currentPageName ?></b></span>
        </div>

    <?php
}

?>