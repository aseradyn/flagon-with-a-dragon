<?php

include($_SERVER["DOCUMENT_ROOT"]."/photos/airtable_client.php");

class PhotoResult {
    public string $name = "";
    public string $caption = "";
    public string $altText = "";
    public string $thumbnailURL = "";
    public string $fullURL = "";
    public string $dateTaken = "";
}

function getPhotos (string $albumName = "", array $photoIds = []) {

    $url = getBaseURL() . "photos";

    // Add query strings to URL
    if (trim($albumName) !== "") {
        // get only what matches the album ID supplied

        $url = $url . "?filterByFormula=IF(FIND(LOWER(%22" . $albumName . "%22)%2C+LOWER(includedInAlbums))%2C+%22true%22)";

    } elseif (sizeOf($photoIds) > 0) {
        // get only what is requested
    }

    // call the API

    $result = callAirtable($url);
    if (!isset($result['records'])) {
        // if nothing is returned from the query, we can stop here
        return;
    }
    $records = $result['records'];

    // format and return the results

    $photos = [];

    foreach ($records as $record) {

        $fields = $record['fields'];

        $photoResult = new PhotoResult;

        if (isset($fields['Name'])) {
            $photoResult->name = $fields['Name'];
        }
        if (isset($fields['caption'])) {
            $photoResult->caption = $fields['caption'];
        }
        if (isset($fields['altText'])) {
            $photoResult->altText = $fields['altText'];
        }
        if (isset($fields['thumbnailURL'])) {
            $photoResult->thumbnailURL = $fields['thumbnailURL'];
        }
        if (isset($fields['fullURL'])) {
            $photoResult->fullURL = $fields['fullURL'];
        }
        if (isset($fields['dateTaken'])) {
            $photoResult->dateTaken = $fields['dateTaken'];
        }

        $photos[] = $photoResult;

    }

    return $photos;

}