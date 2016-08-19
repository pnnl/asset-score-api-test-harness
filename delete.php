<?php
require 'vendor/autoload.php';
require 'guzzleclient.php';
require 'settings.php';
require 'common.php';

$building_id = $_POST['building_id'];
$settings = Settings::getInstance();

if(empty($building_id)) {
  respondWithMessage('Nothing to do, mising building id');
}

try {
  $response = $guzzleclient->request('DELETE', 'preview_buildings/' . $building_id . '.json', [
    'json' => [
      'token' => $settings->getSetting('authentication_token')
    ]
  ]);
} catch (\GuzzleHttp\Exception\ClientException $e) {
  exceptionHasBeenCaught($e);
}

respondWithData($response);
