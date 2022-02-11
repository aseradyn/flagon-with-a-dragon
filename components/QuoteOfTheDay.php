<?php

class Quote {
    public string $quote = "";
    public string $by = "";

    public function set($data) {
        foreach ($data AS $key => $value) $this->{$key} = $value;
    }
}

function ShowTodaysQuote() {

    date_default_timezone_set('America/Chicago');

    // get quotes from file
    $data = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/components/QuoteOfTheDay.json"), true);
    $quotes = new Quote();
    $quotes->set($data);
    $quotesCount = sizeof($data);

    // figure out which quote to show
    $startDate = new DateTime("2022-02-05");
    $today = new DateTime(date("Y-m-d"));
    $dateDiff = $today->diff($startDate)->format("%a");
    while ($dateDiff > $quotesCount) {
        $dateDiff = $dateDiff - $quotesCount;
    }
    $todayQuote = $quotes->$dateDiff;

    ?>

    <div class="quote-text">
        <?php echo $todayQuote["quote"] ?>
    </div>
    <div class="quote-by">
        ~ <?php echo $todayQuote["by"] ?>
    </div>

    <?php

}

?>

<style>
    .quote-text {
        margin-bottom: 1em;
    }
</style>