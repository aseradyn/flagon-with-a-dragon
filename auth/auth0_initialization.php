<?php
declare(strict_types=1);

require('vendor/autoload.php');

// temporarily need to check both locations to support both hosts
$config = '../configurations/authzero.php';
if( file_exists($config) && is_readable($config)) {
    include($config);
} else {
    $AUTH0_DOMAIN = "dev-fisjgu7p.us.auth0.com";
    $AUTH0_CLIENT_ID = getenv("CLIENT_ID");
    $AUTH0_CLIENT_SECRET = getenv("CLIENT_SECRET");
    $AUTH0_COOKIE_SECRET = getenv("COOKIE_SECRET");
}

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