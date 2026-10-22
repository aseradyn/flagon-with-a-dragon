<?php
// Reproduces .htaccess behavior for temp local development env

$path = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Don't rewrite /blog/ or /test/ URLs
if (preg_match('#^/(blog|test)($|/)#', $path)) return false;

// Don't rewrite asset files
if (preg_match('/\.(jpe?g|gif|bmp|png)$/i', $path)) return false;

// Send everything else that isn't a real file to the root controller
if ($path !== '/' && is_file($_SERVER['DOCUMENT_ROOT'] . $path)) return false;

include $_SERVER['DOCUMENT_ROOT'] . '/index.php';
