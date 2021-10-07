<style>
    /* https://www.fontspace.com/steelworks-vintage-font-f24016 */
    @font-face {
        font-family: 'SteelworksVintageDemo';
        src:    url('theme/fonts/SteelworksVintageDemo-P5wE.otf'), 
                url('theme/fonts/SteelworksVintageDemo-rR98.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    /* https://rsms.me/inter/ */
    @import url('theme/fonts/Inter/inter.css');

    body {
        color: <?php echo $useDarkMode ? $gray[200] : $gray[900] ?>;
        background-color: <?php echo $useDarkMode ? $gray[700] : $primary[200]?>;
        padding: 0px;
        margin: 0px;
        font-family: Inter, Arial, sans-serif;
        font-size: 14px;
    }
    a, a:active, a:visited {
        color: <?php echo $useDarkMode ? $secondary[500] : $secondary[700]?>;
        text-underline-position: under;
    }
    h1 {
        font-size: 1.4em;
        font-variant: small-caps;
    }
    h2 {
        font-size: 1.15em;
        font-variant: small-caps;
        margin-top: 30px;
    }

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
    .page-content {
        padding: 20px;
    }
    
</style>