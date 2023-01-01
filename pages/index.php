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
                I am your host, Jill Menning, serial hobbyist, notorious plotter and schemer.
            </p>
        </div>
    </section>

    <section style="grid-area: main">
        <header>
            <h2>
                Here's what I've been up to lately:
            </h2>
        </header>

        <ul class="uptos">
            <li>
                Love spending New Year's Eve trying to figure out why .htaccess files behave differently
                on my shared hosting server vs my local environment. Hoping to add a blog for the new year!
            </li>
            <li>
                Spending the holidays spinning yarn, shopping for furniture, and coloring. I found a great new coloring
                book at Texas Art Supply and spending these cold evenings sitting in front of the fire filling in tiny
                little spaces with colored pencil is a very relaxing way to unwind. Happy holidays to you all!
            </li>
            <li>
                Moved my site back to shared hosting (off Digital Ocean's App Platform). Serverless was a fun 
                experiment, but it gets expensive really fast if you want more than a static site.
            </li>
            <li>
                I just got home from attending An Event Apart in Denver. It was a great conference for front-end developers,
                and I highly recommend it. Even sessions that I wasn't excited about turned out to have really
                interesting information that set the mental wheels turning. Really, really glad I went.
            </li>
            <li>
                I wrote a page about why, even in 2022 when we have React and Svelte and all these other front-end frameworks, I keep defending 
                (and using) PHP. <a href="/webdev/php-is-good-actually">PHP is Good, Actually</a>
            </li>
        </ul>
        <details>
            <summary style="color: #9F0E41; cursor: pointer">More</summary>
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

    </div>
</div>
    

    


<style>

.layout {
    display: grid;
    grid-template-columns: minmax(30em, var(--single-column-width)) 20em;
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

