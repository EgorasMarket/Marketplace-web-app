<?php
$isLive = true;
$whitelist = array(
    '127.0.0.1',
    '::1'
);

if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    $isLive = false;
}

if ($isLive) {
    define('API_SERVER', 'https://api.egoras.com');
} else {
    define('API_SERVER', 'http://egoras-api.com');
}
define('STATIC_VERSION', "0.0.7");
