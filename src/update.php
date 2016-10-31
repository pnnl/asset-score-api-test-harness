<?php
require_once 'vendor/autoload.php';
require_once 'guzzleclient.php';
require_once 'settings.php';
require_once 'common.php';

$building_id = $_POST['building_id'];
$block_id = $_POST['block_id'];
$field_to_update = $_POST['field_to_update'];
$value = $_POST['value'];
$settings = Settings::getInstance();

if(empty($field_to_update) || empty($value) || empty($building_id) || empty($block_id)) {
  respondWithMessage('Nothing to do, mising the key to update, its value, block id or building id');
}

try {
  $response = $guzzleclient->request('PUT', 'preview_buildings/' . $building_id . '.json', [
    'json' => [
      'token' => $settings->getSetting('authentication_token'),
      'building' => [
        'block_id' => $block_id,
        $field_to_update => $value
      ]
    ]
  ]);
} catch (\GuzzleHttp\Exception\ClientException $e) {
  exceptionHasBeenCaught($e);
}

respondWithData($response);
