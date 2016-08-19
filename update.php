<?php
require 'vendor/autoload.php';
require 'guzzleclient.php';
require 'settings.php';
require 'common.php';

$building_id = $_POST['building_id'];
$key_to_update = $_POST['key_to_update'];
$value = $_POST['value'];
$settings = Settings::getInstance();

if(empty($key_to_update) || empty($value) || empty($building_id)) {
  respond("index.php?result=Nothing to do, mising the key to update, its value or building id");
}

try {
  $response = $guzzleclient->request('PUT', 'preview_buildings/' . $building_id . '.json', [
    'json' => [
      'token' => $settings->getSetting('authentication_token'),
      'building' => [$key_to_update => $value]
    ]
  ]);
} catch (\GuzzleHttp\Exception\ClientException $e) {
  $response_message = 'Caught Exception: ' . $e->getResponse()->getStatusCode();
  respond("index.php?result=" . $response_message);
}

$response_message = 'Status code: ' . $response->getStatusCode() . '; Body: ' . (string)$response->getBody();

respond("index.php?result=" . $response_message);
