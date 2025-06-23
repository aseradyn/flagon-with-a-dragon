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

<style>

.layout {
    display: grid;
    grid-template-columns: minmax(30em, var(--single-column-width)) 15em;
    grid-template-rows: auto 1fr;
    grid-template-areas:    "main welcome"
                            "main secondary";
    column-gap: 30px;
    row-gap: 30px;
    align-items: start;
    align-content: start;
    justify-content: center;
}

@media screen and (max-width: 1000px) {
    .layout {
        grid-template-columns: 1fr;
        grid-template-areas: "welcome"
                            "main"
                            "secondary";
    }
}

.welcome {
    position: relative;
    width: 100%;
    color: #E84855;
}

.sidebar-modules {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

</style>

