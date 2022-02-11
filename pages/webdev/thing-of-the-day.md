A Simple Thing-of-the-Day Function
=======================================

I wanted to have a simple way to show an 'X of the day' on my site: photo, quote, random article, whatever. I _did not_ want to have to set up (and pay for) a database for something so simple. I had a few iterations on this, but here's what I settled on:

```php
function getTodaysQuote() {

    date_default_timezone_set('America/Chicago');

    // Get quotes from a json file
    $data = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/components/QuoteOfTheDay.json"), true);
    $quotes = new Quote();
    $quotes->set($data);
    $quotesCount = sizeof($data);

    // Dates for comparison
    $startDate = new DateTime("2022-01-05");
    $today = new DateTime(date("Y-m-d"));
    // the number of days difference between them
    $dateDiff = $today->diff($startDate)->format("%a");
    // then start cutting it down by loops through the list
    while ($dateDiff > $quotesCount) {
        $dateDiff = $dateDiff - $quotesCount;
    }
    // and that's your quote of the day!
    return $quotes->$dateDiff;
}
```

There are probably fancier math ways to do this, but this is simple and fast. 

If you alter the list of items and want to make sure there are no skips or repeats, you can adjust the start date to compensate.