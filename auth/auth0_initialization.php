<?php
declare(strict_types=1);

require('vendor/autoload.php');

use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;

$configuration = new SdkConfiguration(
    domain: 'dev-fisjgu7p.us.auth0.com',
    clientId: $_ENV["CLIENT_ID"],
    clientSecret: $_ENV["CLIENT_SEC"],
    redirectUri: 'http://' . $_SERVER['HTTP_HOST'] . "/callback",
    cookieSecret: $_ENV["COOKIE_SEC"]
);

$auth0 = new Auth0($configuration);

?>