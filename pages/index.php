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
            <h2>
                Here's what I've been up to lately:
            </h2>
        </header>

        <div>
            <?php 
            include_once($_SERVER["DOCUMENT_ROOT"]."/components/rss-feed-complete.php");
            rssFeedComplete("https://social.jmenning.com/@jill.rss", 5) 
            ?>
        </div>
        <footer>
            <p style="text-align: center">See more: <a href="https://social.jmenning.com/@jill">Mastodon</a> | <a href="https://social.jmenning.com/@jill.rss">RSS</a></p>
        </footer>

    </section>

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

.uptos {
    list-style-type: circle;
}

.uptos>li {
    margin-bottom: 20px;
    padding-left: 5px;
}

.uptos>li::marker {
    font-size: 1.3em;
}

</style>

