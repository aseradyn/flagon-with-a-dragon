
<style>
    <?php
    $theme = $_SESSION["theme"];
    include($_SERVER["DOCUMENT_ROOT"]."/themes//".$theme."/home-page.css");
    ?>
</style>


<div class="single-column-layout">
<div class="layout">

    <section style="grid-area: welcome">
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

    <section style="grid-area: main">
        <header>
            <h1>Ephemera</h1>
            <p style="text-align: center">These posts will self destruct</p>
            <p style="text-align: center"><a href="/ephemera/rss">RSS</a></p>
        </header>
        <?php include_once $_SERVER["DOCUMENT_ROOT"]."/components/ephemera.php"; ?>
    </section>

    <div class="sidebar-modules">
        <section>
            <?php include_once $_SERVER["DOCUMENT_ROOT"]."/components/webring.php"; ?>
        </section>

        <section>
            <p>
                You can also find me on
            <a href="https://social.jmenning.com/@jill">Mastodon</a>
</p>
        </section>
    </div>

    </div>
</div>
</div>

