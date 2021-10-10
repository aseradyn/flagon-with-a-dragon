
</div id="page-content">
</div id="top-wrapper">
<style>
    #footer-container {
        border-top: 1px solid <?php echo $useDarkMode ? $primary[500] : $primary[400]?>;
        background-color: <?php echo $useDarkMode ?$primary[600] : $primary[500]?>;
        padding: 5px 10px 10px 15px;
        align-self: end;
        font-size: 0.8em;
        display: grid;
        grid-template-columns: auto auto;
        color: <?php echo $useDarkMode ? "inherit" : "white"?>;
    }
    #footer-container a, 
    #footer-container a:active, 
    #footer-container a:visited {
            color: <?php echo $useDarkMode ? $secondary[300] : $secondary[200] ?>;
        }
</style>

<div id="footer-container">
    <div style="justify-self: start">Want to talk? <a href="mailto:jill@jmenning.com">We are go for email!</a></div>
    <a style="justify-self: end" href="/credits.php">Credits</a>
</div>
    </div id="page">

</body>
</html>