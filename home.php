<style>
    .home-welcome {
        color: var(--accent700); 
        font-size: 1.1em; 
        font-weight: bolder;
        letter-spacing: 1px;
    }
    .dark-mode .home-welcome {
        color: var(--accent500);
    }
    .subject-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
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
    }
    .subject-description img {
        width: 100%;
        border: 1px solid var(--primary200);
        margin-bottom: 20px;
    }
    .dark-mode .subject-description img {
        border-color: var(--primary600);
    }
    .subject-link {
        align-self: end;
        display: grid;
        grid-template-columns: 2em auto;
        align-items: center;
        gap: 5px;
    }
    .subject-link .material-icons {
        color: var(--primary400);
    }
    .dark-mode .subject-link .material-icons {
        color: var(--primary300);
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
                    My personal life and endless <b>hobbies</b>? 
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
                    <a href="/personal" title="Go to my non-professional stuff">Follow me down the rabbit hole</a>
                </div>
            </div>
        </div>
    </div>
</div>