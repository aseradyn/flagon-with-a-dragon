<div class="single-column-layout">
    <section>
        <header>
            <h1>Superbowl Squares Generator</h1>
        </header>
        <p>
            This tool was built as a way to experiment around with <a href="https://htmx.org/">htmx</a>. The htmx library (39 kB) is 
            the only javascript involved, and notice that there is no page reload to handle the form posting. Check out the code that makes this
            work in <a href="https://github.com/aseradyn/flagon-with-a-dragon/pull/12">this PR</a>.
        </p>
    </section>
    
    <section>
    <p>
        At my office, there's always someone with a Google Sheet taking bets for Superbowl Squares. The hardest part is generating the 
        random numbers. That's what this tool is inteneded for: to make it fast and simple to copy random numbers on to a completed sheet.
    </p>

    <form hx-post="/tools/superbowl-squares-generator" hx-target="#generated-squares">
        <label for="number-of-squares">Number of squares:</label>    
        <input type="number" name="count" id="number-of-squares" value="1" />
        <input type="submit" value="Generate Squares"></input>
    </form>
    <div id="generated-squares" style="margin-top: 20px"></div>
    </section>
</div>