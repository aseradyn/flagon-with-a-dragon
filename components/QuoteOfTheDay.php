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

    $data = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/components/QuoteOfTheDay.json"), true);
    $quotes = new Quote();
    $quotes->set($data);

    $quotesCount = sizeof($data);

    $lastQuote = json_decode((file_get_contents($_SERVER["DOCUMENT_ROOT"]."/components/QuoteOfTheDay_last.json")));
    $lastQuoteNumber = $lastQuote->quoteNumber;
    $lastDate = $lastQuote->date;

    $today = date("Y-m-d");

    $todayQuoteIndex = $lastQuoteNumber - 1;            // if the quote has already been incremented today (-1 for 0-based array)
    if ($lastQuoteNumber > $quotesCount ) {             // if the quotes list has shrunk
        $todayQuoteIndex = 0;
    } else if ($today != $lastDate) {                   // otherwise
        if ($lastQuoteNumber < $quotesCount) {          // if we're not yet on the last quote
            $todayQuoteIndex = $todayQuoteIndex + 1;    // go up one
        } else {                                        // it was the last in the list
            $todayQuoteIndex = 0;                       // go back to the beginning
        }
        // and write the new record to the file
        $newQuoteNumber = $todayQuoteIndex + 1;
        $newRecord = array('quoteNumber' => $newQuoteNumber, 'date' => $today);
        $newJSON = json_encode($newRecord);
        $file = fopen($_SERVER["DOCUMENT_ROOT"]."/components/QuoteOfTheDay_last.json", "w");
        fwrite($file, $newJSON);
        fclose($file);
    }

    $todayQuote = $quotes->$todayQuoteIndex;

    ?>

    <div class="quote-text">
        <?php echo $todayQuote["quote"] ?>
    </div>
    <div class="quote-by">
        ~ <?php echo $todayQuote["by"] ?>
    </div>

    <?php

    // this might work some day?
    // $url = "https://get-last-quote.aseradyn.workers.dev";
    // echo file_get_contents($url);

}

?>

<style>
    .quote-text {
        margin-bottom: 1em;
    }
</style>