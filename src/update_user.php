<?php
require_once 'vendor/autoload.php';
require_once 'guzzleclient.php';
require_once 'settings.php';
require_once 'common.php';

$user_id = $_POST['user_id'];
$field_to_update = $_POST['field_to_update'];
$value = $_POST['value'];
$settings = Settings::getInstance();

if(empty($field_to_update) || empty($value) || empty($user_id)) {
  respondWithMessage('Nothing to do, mising the key to update, its value, or user id');
}

try {
  $response = $guzzleclient->request('PUT', 'users/' . $user_id . '.json', [
    'json' => [
      'token' => $settings->getSetting('authentication_token'),
      $field_to_update => $value
    ]
  ]);
} catch (\GuzzleHttp\Exception\ClientException $e) {
  exceptionHasBeenCaught($e);
}

respondWithData($response);
