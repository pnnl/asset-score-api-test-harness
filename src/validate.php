<?php
require 'vendor/autoload.php';
require 'guzzleclient.php';
require 'common.php';
require 'settings.php';

$building_id = $_POST['building_id'];
$settings = Settings::getInstance();

if(empty($building_id)) {
  respondWithMessage('Nothing to do, no building id passed in');
}

try {
  $response = $guzzleclient->request('GET', 'preview_buildings/' . $building_id . '/validate?token=' . $settings->getSetting('authentication_token'));
} catch (\GuzzleHttp\Exception\ClientException $e) {
  exceptionHasBeenCaught($e);
}

respondWithData($response);
