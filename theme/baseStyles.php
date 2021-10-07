<style>

    .my-container {
        width: 100%;
        display: grid;
        justify-items: center;
        padding-top: 20px;
        width: 100%;
    }
    .section {
        margin-top: 50px;
        display: grid;
        justify-items: center;
    }
    .subject-group {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        align-items: stretch;
        gap: 20px;
        padding: 20px;

        @media only screen and (max-width: 950px) {
            grid-template-columns: auto;
        }
    }
    .subject-card {
        display: grid;
        grid-template-rows: auto auto;
    }
    .subject-description {
        align-self: start;

        & img {
        width: 100%;
        border: 1px solid <?php echo $useDarkMode ? $primary[600] : $primary[200] ?>;
        margin-bottom: 20px;
        }
    }
    .subject-link {
        align-self: end;
        display: grid;
        grid-template-columns: 2em auto;
        align-items: center;
    }

    .subject-link .material-icons {
        color: <?php echo $useDarkMode ? $primary[400] : $primary[400] ?>
    }

    .home-welcome {
        color: <?php echo $useDarkMode ? $accent[500] : $accent[700] ?>; 
        font-size: 1.1em; 
        font-weight: bolder;
        letter-spacing: 1px;
    }
</style>