<?php
require 'vendor/autoload.php';
require 'guzzleclient.php';
require 'settings.php';
require 'common.php';

$email = $_POST['email'];
$password = $_POST['password'];
$organization_token = $_POST['organization_token'];
$settings = Settings::getInstance();
$response = null;

if(empty($email) || empty($password) || empty($organization_token)) {
  respond("index.php?result=Nothing to do, mising username, password or organization token");
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
  $response_message = 'Caught Exception: ' . $e->getResponse()->getStatusCode();
  respond("index.php?result=" . $response_message);
}

$response_message = 'Status code: ' . $response->getStatusCode() . '; Body: ' . (string)$response->getBody();
$response_data = json_decode($response->getBody(), true);
$settings->updateSetting('authentication_token', $response_data['token']);

respond("index.php?result=" . $response_message);
