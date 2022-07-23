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
            <li>
                I spent some time fooling around with <a href="https://htmx.org/">htmx</a>. I'm really impressed with how simple it is to use, 
                to add just a little AJAX without a heavy framework. I built a quick-and-dirty <a href="/webdev/htmx-sample-squares-generator">Superbowl Squares Generator</a> 
                to test the concept.
            </li>
            <li>
                After nine months, a project I've been working on (HCSS Drive) is leaving the nest. It'll be assigned to 
                a new team for maintenance and future updates, and I'll be off onto new challenges. Integrations! 
                Custom reporting! Exciting times ahead.
            </li>
            <li>
                It's looking to be a long, hot, dry summer. I spent the weekend setting up an automated foundation watering system.
                Slab foundations and expanding soils are not a good combination, but $150 in soaker hoses, timers, and accessories, and 
                a little work with a shovel, is a good investment to keep the foundation stable.
            </li>
            <li>
                I just got a new book-style charkha! In the US, 'charkha' refers to accelerated, driven-spindle spinning wheels,
                usually designed to fold up for easy transport. This one spins decently 'out of the box', but I needed to do some 
                tweaking and make a couple of small modifications to get it to spin the way I like it.
            </li>
            <li>
                I learned to use Bicep files to deploy resources on Azure, including setting things like access policies 
                and scaling rules. There were a few false steps (I took production down for about 20 minutes - oops) but 
                fortunately, the app I was working on has very low traffic at the moment, so I didn't inconvenience many people. It's
                about to go big, though!
            </li>
            <li>
                I've been refurbishing a vintage treadle sewing machine. Lots to learn about leather drive belts, bobbin shuttles, and 
                cleaning old grunge off fancy paint.
            </li>
            
            
        </ul>
        <details>
            <summary>Previous</summary>
            <ul class="uptos">
            <li>
                Inspired by SvelteKit, I rewrote my router and reorganized the files on my site. I updated <a href="/webdev/simple-php-router">this 
                article</a> based on my changes. I also gave the site a big facelift and spent some time 
                writing some new photo gallery components - so much fun!
            </li>
            <li>
                I decided I didn't like my new web site after all, and started a new-new site built with SvelteKit! I'm
                learning some new stuff along
                the way, and having a great time. Of course, I inevitably ran into deployment issues (it's new, it's
                Node, it can get nasty),
                so I don't think it's quite right for me ... yet?
            </li>
            <li>
                I binged all 24 episodes of <a href="https://boghouse.thehannah.org/">'The Boghouse'</a>, a podcast by
                and about a
                couple who wanted to buy a theater and got a lot more than they bargained for. Finance! Archaeology!
                True crime! Shenanigans!
            </li>
            <li>
                I visited my mother in Arizona over Christmas. I dragged her up to <a href="/photos/grand-canyon">the
                    Grand Canyon</a>, which was beyond amazing,
                and we took up a new hobby: watercolors!
            </li>
            <li>
                My local weaving guild, <a href="https://weavehouston.org">Contemporary Handweavers of Houston</a>,
                started up a new spinning group, and we had our first meeting. I'm super excited!
                It's a great mix of experience levels and interests, and we should all have a fabulous time learning
                from each other.
            </li>
</ul>
        </details>

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

