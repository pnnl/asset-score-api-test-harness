<?php
require_once 'vendor/autoload.php';
require_once 'guzzleclient.php';
require_once 'settings.php';
require_once 'common.php';

$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
$organization_token = htmlspecialchars($_POST['organization_token'], ENT_QUOTES, 'UTF-8');
$settings = Settings::getInstance();
$response = null;

if(empty($email) || empty($password) || empty($organization_token)) {
  respondWithMessage('Nothing to do, mising username, password or organization token');
}

try {
  $response = $guzzleclient->request('POST', 'users/authenticate', [
    'json' => [
      'email' => $email,
      'password' => $password,
      'organization_token' => $organization_token
    ]
  ]);
} catch (\GuzzleHttp\Exception\ClientException $e) {
  exceptionHasBeenCaught($e);
}

$response_data = json_decode($response->getBody(), true);
$settings->updateSetting('authentication_token', $response_data['token']);

respondWithData($response);
