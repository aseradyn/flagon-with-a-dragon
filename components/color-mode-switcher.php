<?php


function colorMode($mode) {

?>

    <script>
        function mouseOverDayMode() {
            document.getElementById("sun").classList.add("fa-spin");
        }
        function mouseOutDayMode() {
            document.getElementById("sun").classList.remove("fa-spin");
        }
        function mouseOverNightMode() {
            document.getElementById("moon").classList.add("fa-spin");
        }
        function mouseOutNightMode() {
            document.getElementById("moon").classList.remove("fa-spin");
        }
        function goDayMode() {
            document.getElementById("go-day-mode").submit();
        }
        function goNightMode() {
            document.getElementById("go-night-mode").submit();
        }
    </script>

    <div id="color-mode-switcher" style="display: grid; grid-template-columns: 1fr 1fr">
        <form id="go-day-mode" action="/tools/color-mode" method="post">
            <input type="hidden" name="redirectURL" value=<?php echo $_SERVER['REQUEST_URI'] ?> />
            <input type="hidden" name="mode" value="day" />
            <span class="fa-stack fa-lg" onclick="goDayMode()" onmouseover="mouseOverDayMode()" onmouseout="mouseOutDayMode()">
                <i class="fa fa-circle-thin fa-stack-2x" <?php if ($mode == "night") echo "style='opacity: 0'" ?>></i>
                <i id="sun" class="fa fa-sun-o fa-stack-1x"></i>
            </span>
        </form>

        <form id="go-night-mode" action="/tools/color-mode" method="post">
            <input type="hidden" name="redirectURL" value=<?php echo $_SERVER['REQUEST_URI'] ?> />
            <input type="hidden" name="mode" value="night" />
            <span class="fa-stack fa-lg" onclick="goNightMode()" onmouseover="mouseOverNightMode()" onmouseout="mouseOutNightMode()">
                <i class="fa fa-circle-thin fa-stack-2x" <?php if ($mode == "day") echo "style='opacity: 0'" ?> ></i>
                <i id="moon" class="fa fa-moon-o fa-stack-1x <?php if ($mode == "night") echo "fa-inverse" ?>"></i>
            </span>
        </form>
    </div>

<?php
    }

?>