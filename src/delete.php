<?php
require_once 'vendor/autoload.php';
require_once 'guzzleclient.php';
require_once 'settings.php';
require_once 'common.php';

$building_id = htmlentities($_POST['building_id'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
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
