<?php
declare(strict_types=1);

require('vendor/autoload.php');
require('../configurations/authzero.php');

use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;

$configuration = new SdkConfiguration(
    domain: $AUTH0_DOMAIN,
    clientId: $AUTH0_CLIENT_ID,
    clientSecret: $AUTH0_CLIENT_SECRET,
    redirectUri: 'https://' . $_SERVER['HTTP_HOST'] . "/auth/callback",
    cookieSecret: $AUTH0_COOKIE_SECRET
);

$auth0 = new Auth0($configuration);

?>