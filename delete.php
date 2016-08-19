<?php
require 'vendor/autoload.php';
require 'guzzleclient.php';
require 'settings.php';
require 'common.php';

$building_id = $_POST['building_id'];
$settings = Settings::getInstance();

if(empty($building_id)) {
  respond("index.php?result=Nothing to do, mising building id");
}

try {
  $response = $guzzleclient->request('DELETE', 'preview_buildings/' . $building_id . '.json', [
    'json' => [
      'token' => $settings->getSetting('authentication_token')
    ]
  ]);
} catch (\GuzzleHttp\Exception\ClientException $e) {
  $response_message = 'Caught Exception: ' . $e->getResponse()->getStatusCode();
  respond("index.php?result=" . $response_message);
}

$response_message = 'Status code: ' . $response->getStatusCode() . '; Body: ' . (string)$response->getBody();

respond("index.php?result=" . $response_message);
