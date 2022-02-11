<div class="single-column-layout">
    <section>
        <h1>
            <div class="welcome">
                Welcome!
            </div>

            I'm so glad you're here!
        </h1>

        <p style="text-align: center; padding-bottom: 20px;">
            I am your host, Jill Menning, serial hobbyist, notorious plotter and schemer.
        </p>

    </section>

    <section>

        <h2>
            Here's what I've been up to lately:
        </h2>

        <ul class="uptos">
            <li style="list-style-type: '👩‍💻'">
                Fooling around with Cloudflare Workers. They didn't end up working out for my use case, but the experience gives me a much
                better grasp of what they <em>are</em> good for.
            </li>
            <li style="list-style-type: '👩‍💻'">
                Inspired by SvelteKit, I rewrote my router and reorganized the files on my site. I updated <a href="/webdev/simple-php-router">this 
                article</a> based on my changes. I also gave the site a big facelift and spent some time 
                writing some new photo gallery components - so much fun!
            </li>
            <li style="list-style-type: '👩‍💻'">
                I decided I didn't like my new web site after all, and started a new-new site built with SvelteKit! I'm
                learning some new stuff along
                the way, and having a great time. Of course, I inevitably ran into deployment issues (it's new, it's
                Node, it can get nasty),
                so I don't think it's quite right for me ... yet?
            </li>
            <li style="list-style-type: '🎧'">
                I binged all 24 episodes of <a href="https://boghouse.thehannah.org/">'The Boghouse'</a>, a podcast by
                and about a
                couple who wanted to buy a theater and got a lot more than they bargained for. Finance! Archaeology!
                True crime! Shenanigans!
            </li>
            <li style="list-style-type: '🌵'">
                I visited my mother in Arizona over Christmas. I dragged her up to <a href="/photos/grand-canyon">the
                    Grand Canyon</a>, which was beyond amazing,
                and we took up a new hobby: watercolors!
            </li>
            <li style="list-style-type: '🧶'">
                My local weaving guild, <a href="https://weavehouston.org">Contemporary Handweavers of Houston</a>,
                started up a new spinning group, and we had our first meeting. I'm super excited!
                It's a great mix of experience levels and interests, and we should all have a fabulous time learning
                from each other.
            </li>
        </ul>

    </section>

    <section>
        <h2>
            And now, your quote of the day:
        </h2>
    <?php 
        include $_SERVER["DOCUMENT_ROOT"]."/components/QuoteOfTheDay.php";
        ShowTodaysQuote();
    ?>
    </section>
</div>

<style>

.welcome {
    position: relative;
    width: 100%;
    color: var(--accent600);
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

section {
    margin-top: 20px;
    padding-bottom: 20px;
}
section:first-of-type {
    margin-top: 0px;
    padding-bottom: 0px;
}
</style>

