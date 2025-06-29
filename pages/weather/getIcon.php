<?php

function getIcon($period) {

    $shortForecast = $period['shortForecast'];

    $rainChance = $period['probabilityOfPrecipitation']['value'];
    $isDaytime = $period['isDaytime'];

    $iconName = "";

    if ($rainChance < 25) {
        if ($isDaytime == true) {
            $iconName = "sun";
        } else {
            $iconName = "moon-stars";
        }
    }

    if ($rainChance >=25 && $rainChance < 75) {
        if ($isDaytime == true) {
            $iconName = "cloud-sun-rain";
        } else {
            $iconName = "cloud-moon-rain";
        }
    }

    if ($rainChance >= 75) {
        $iconName = "cloud-showers";
    }

    echo "<img src='/pages/weather/icons/$iconName.svg' class='weather-icon' title='$shortForecast'/>";
    return;

}

?>