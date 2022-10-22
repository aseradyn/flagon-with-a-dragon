<?php

include_once('./readings/types.php');
include_once('./meals/types.php');

?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body onload="onload();">
        <!-- Readings -->
        <h1>Enter a Reading</h2>
        <form hx-post="./readings/createReading.php" hx-target="#reading_response">
            <div style="display: grid; grid-template-columns: auto 1fr; row-gap: 20px; column-gap: 10px; min-width: 300px">
            <label for="reading">Reading:</label>    
            <input type="number" name="value" id="value" style="width: 100%" />
            <label for="type">Reading Type:</label>  
            <select name="type" id="type"  style="width: 100%">
                <option name=""> </option>
                <?php
                    foreach($ReadingTypes as $type) {
                        echo "<option value='$type'>$type</option>";
                    }
                ?>
            </select>
            <label for="dateTime">Reading Date and Time:</label>
            <input type="datetime-local" name="dateTime" id="dateTime" style="width: 100%" />
            <div></div>
            <input type="submit" value="Log"></input>
            </div>
        </form>
        <div id="reading_response"></div>

        <!-- MEALS -->
        <h1>Log a meal</h1>
        <?php
            foreach ($MealTypes as $type) {
                ?>
                    <form hx-post="./meals/createMeal.php" hx-target="#meal_response">
                        <input type="hidden" name="type" id="type" value="<?php echo $type ?>" />
                        <input type="submit" value="<?php echo $type ?>"></input>
                    </form>
                <?php
            }
            
        ?>
        <div id="meal_response"></div>

        <h2>Last Meal:</h2>
        <form id="last-meal-form" hx-get="./meals/readMeal.php" hx-target="#last-meal_response">
            <input type="submit" value="Refresh"></input>
        </form>
        <div id="last-meal_response"></div>

        
        <script src="/utilities/htmx.min.js"></script>
        <script type="text/javascript">
            function onload() {
                // const form = document.getElementById("last-meal-form");
                // form.submit();
                console.log("hi");
            }
            
        </script>
</body>
</html>