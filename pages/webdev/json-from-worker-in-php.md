Getting JSON values from Cloudflare Workers in PHP
==================================================

TIL about `file_get_contents()`. Quick bite!

```php
// My worker returns a JSON object
$widgetJSON = file_get_contents('http://widget.myservices.workers.dev');
// Which I can then decode
$widgetObject = json_decode($widgetJSON);
// and print
print_r($widgetObject);

```

Remember:

* This call is going to block the rest of the page until it completes! 
* There could be something malicious embedded in the string

Use this power wisely.