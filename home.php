<style>
    .home-welcome {
        color: <?php echo $useDarkMode ? $accent[500] : $accent[700] ?>; 
        font-size: 1.1em; 
        font-weight: bolder;
        letter-spacing: 1px;
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
        gap: 5px;
    }

    .subject-link .material-icons {
        color: <?php echo $useDarkMode ? $primary[300] : $primary[400] ?>
    }
</style>

<div class="my-container" customStyles={MyContainerStyleProps}>
    <span class="home-welcome">
        Welcome!
    </span> I'm so glad you're here!
    <div class="section">
    <span>What can I interest you in?</span>
        <div class="subject-group">
            <div class="card subject-card">
                <div class="subject-description">
                    My <b>professional</b> experience?
                    <p>Including:</p>
                    <ul>
                        <li>User experience and interface design</li>
                        <li>Web development (focus on UI)</li>
                        <li>Technical communication</li>
                    </ul>
                </div>
                <div class="subject-link">
                    <?php Icon('ads_click') ?>
                    <a href="/professional" title="Go to Professional">Click this way</a>
                </div>
            </div>
            <div class="card subject-card">
                <div class="subject-description">
                    My <b>personal</b> life? 
                    <p>Such as:</p>
                    <ul>
                        <li>Travel</li>
                        <li>Pets</li>
                        <li>Beloved books and media</li>
                    </ul>
                </div>
                <div class="subject-link">
                    <?php Icon('beach_access') ?>
                    <a href="/personal" title="Go to Personal">Let's hang out</a>
                </div>
            </div>
            <div class="card subject-card">
                <div class="subject-description">
                    My endless <b>hobbies</b>? 
                    <p>Especially:</p>
                    <ul>
                        <li>Spinning yarn</li>
                        <li>Weaving cloth</li>
                        <li>Growing flowers</li>
                        <li>Pointing my camera at things</li>
                    </ul>
                </div>
                <div class="subject-link">
                    <?php Icon('airport_shuttle') ?>
                    <a href="/hobbies" title="Go to Hobbies">Follow me down the rabbit hole</a>
                </div>
            </div>
        </div>
    </div>
</div>