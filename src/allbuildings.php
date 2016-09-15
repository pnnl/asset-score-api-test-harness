<?php
require_once 'vendor/autoload.php';
require_once 'guzzleclient.php';
require_once 'common.php';
require_once 'settings.php';

$settings = Settings::getInstance();

try {
  $response = $guzzleclient->request('GET', 'preview_buildings?token=' . $settings->getSetting('authentication_token'));
} catch (\GuzzleHttp\Exception\ClientException $e) {
  exceptionHasBeenCaught($e);
}

respondWithData($response);
