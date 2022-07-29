<?php
declare(strict_types=1);

require('vendor/autoload.php');

use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;

$configuration = new SdkConfiguration(
    domain: 'dev-fisjgu7p.us.auth0.com',
    clientId: getenv("CLIENT_ID"),
    clientSecret: getenv("CLIENT_SECRET"),
    redirectUri: 'https://' . $_SERVER['HTTP_HOST'] . "/auth/callback",
    cookieSecret: getenv("COOKIE_SECRET")
);

$auth0 = new Auth0($configuration);

?>