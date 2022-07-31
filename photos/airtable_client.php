<?php

function getBaseURL() {
    return "https://api.airtable.com/v0/appATdJJbcKWLYcA7/";
}

function callAirtable(string $url) {

    $headers = array(
        'Content-Type: application/json',
        "Authorization: Bearer " . getenv("AIRTABLE_KEY"),
    );

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($curl);
    curl_close($curl);
    return json_decode($result, true);

}


