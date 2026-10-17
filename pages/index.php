
<style>
    <?php
    $theme = $_SESSION["theme"];
    include($_SERVER["DOCUMENT_ROOT"]."/themes//".$theme."/home-page.css");
    ?>
</style>


<div class="single-column-layout">

    <section>
        <header>
            <h1>
                <div class="welcome">
                    Welcome!
                </div>
            </h1>
            <p style="text-align: center">I'm so glad you're here!</p>
        </header>
        <div style="text-align: center; padding-bottom: 10px;">
            <p>
                I am your host, Jill Menning, serial hobbyist, notorious plotter and schemer
            </p>
        </div>
    </section>

    <section>
        <header id="ephemera">
            <h1>Ephemera</h1>
            <p id="ephemera-subtitle">These posts will self destruct</p>
            <p id="ephemera-rss"><a href="/ephemera/rss"><img src="/images/rss.svg" alt="RSS icon"/>RSS</a></p>
        </header>
        <?php
            $ephemeraCount = 3; 
            include_once $_SERVER["DOCUMENT_ROOT"]."/components/ephemera.php"; 
        ?>
        <p><a href="/ephemera">Previous Ephemera -></a></p>
    </section>

    <div class="sidebar-modules">
        <section>
            <?php include_once $_SERVER["DOCUMENT_ROOT"]."/components/webring.php"; ?>
        </section>
    </div>

</div>
</div>

