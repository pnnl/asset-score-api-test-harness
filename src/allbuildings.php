<?php
require 'vendor/autoload.php';
require 'guzzleclient.php';
require 'common.php';
require 'settings.php';

$settings = Settings::getInstance();

try {
  $response = $guzzleclient->request('GET', 'preview_buildings?token=' . $settings->getSetting('authentication_token'));
} catch (\GuzzleHttp\Exception\ClientException $e) {
  exceptionHasBeenCaught($e);
}

respondWithData($response);
