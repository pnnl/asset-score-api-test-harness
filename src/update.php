<?php
require_once 'vendor/autoload.php';
require_once 'guzzleclient.php';
require_once 'settings.php';
require_once 'common.php';

$building_id = htmlspecialchars($_POST['building_id'], ENT_QUOTES, 'UTF-8');
$field_to_update = htmlspecialchars($_POST['field_to_update'], ENT_QUOTES, 'UTF-8');
$value = htmlspecialchars($_POST['value'], ENT_QUOTES, 'UTF-8');
$settings = Settings::getInstance();

if(empty($field_to_update) || empty($value) || empty($building_id)) {
  respondWithMessage('Nothing to do, mising the key to update, its value or building id');
}

try {
  $response = $guzzleclient->request('PUT', 'preview_buildings/' . $building_id . '.json', [
    'json' => [
      'token' => $settings->getSetting('authentication_token'),
      'building' => [$field_to_update => $value]
    ]
  ]);
} catch (\GuzzleHttp\Exception\ClientException $e) {
  exceptionHasBeenCaught($e);
}

respondWithData($response);
