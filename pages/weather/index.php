<style>
    .weather-icon {
        height: 20px;
        width: 20px;
    }

    .weather-section {
        display: grid;
        justify-items: center;
    }

    .weather-grid {
        display: grid;
        grid-template-columns: auto auto;
        gap: 10px;
        justify-items: center;
        width: fit-content;
    }

    @media (prefers-color-scheme: dark) {
        .weather-icon {
            filter: invert(1);
        }
    }
</style>

<div class="single-column-layout">

<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/pages/weather/getIcon.php");

$userAgent = "User-Agent: jmenning.com (jill@jmenning.com)";

function convertCtoF($tempC) {
    $tempF = $tempC * 1.8;
    $tempF = $tempF + 32;
    return round($tempF);
}

function convertKMtoM($speedKMH) {
    $speedMPH = $speedKMH / 1.609;
    return round($speedMPH);
}

function convertDegreesToDirection($degrees) {
    if ($degrees > 330 and $degrees < 30) return "N";
    if ($degrees > 30 and $degrees < 60) return "NE";
    if ($degrees > 60 and $degrees < 120) return "E";
    if ($degrees > 120 and $degrees < 150) return "SE";
    if ($degrees > 150 and $degrees < 220) return "S";
    if ($degrees > 220 and $degrees < 250) return "SW";
    if ($degrees > 250 and $degrees < 310) return "W";
    if ($degrees > 310 and $degrees < 330) return "NW";
}

$currentObservationsDataUrl = 'https://api.weather.gov/stations/kdma/observations';
$forecastDataUrl = 'https://api.weather.gov/gridpoints/TWC/96,51/forecast';

// Fetch the latest observation
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $currentObservationsDataUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    $userAgent
]);
$observationsResponse = curl_exec($ch);
curl_close($ch);
$observationData = json_decode($observationsResponse, true)['features'][0]['properties'];
$actualTemp = convertCtoF($observationData['temperature']['value']);
$feelsLikeTemp = convertCtoF($observationData['heatIndex']['value']);
$windSpeed = convertKMtoM($observationData['windSpeed']['value']);
$windDirection = convertDegreesToDirection($observationData['windDirection']['value']);

?>

<section class="weather-section">
    <h3>Currently</h3>
    <p><?= $actualTemp ?> feels like <?= $feelsLikeTemp ?></p>
    <p><?= $windSpeed ?> mph <?= $windDirection ?></p>
</section>

<?php 

// Fetch the forecast data
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $forecastDataUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    $userAgent
]);
$forecastResponse = curl_exec($ch);
curl_close($ch);
$forecastData = json_decode($forecastResponse, true);

// Display the forecast
if (isset($forecastData['properties']['periods'])) {
    
    echo "<section class='weather-section'><div class='weather-grid'>";

    $isDaytime = $forecastData['properties']['periods'][0]['isDaytime'];
    if ($isDaytime == false or $isDaytime == 0) {
        echo "<div></div>";
    }

    foreach ($forecastData['properties']['periods'] as $period) {

        $shortForecast = $period['shortForecast'];
        ?>

        <div>
            <h3><?= $period['name'] ?></h3>
            <p><?php getIcon($period) ?> <?= $period['temperature'] ?> <?= $period['temperatureUnit'] ?></p>
            <p><?= $period['probabilityOfPrecipitation']['value']?>% chance of rain</p>
            <p><?= $period['windSpeed']?> <?= $period['windDirection']?></p>
        </div>

        <?php
    }

    echo "</div></section>";

} else {
    echo "Unable to retrieve forecast data.";
}

?>

</div>