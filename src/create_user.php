<?php
require_once 'vendor/autoload.php';
require_once 'guzzleclient.php';
require_once 'settings.php';
require_once 'common.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];
$organization_token = $_POST['organization_token'];


if(
  empty($first_name) ||
  empty($last_name) ||
  empty($email) ||
  empty($password) ||
  empty($password_confirmation) ||
  empty($organization_token)
) {
  respondWithMessage('Nothing to do, one or more fields missing');
}

try {
  $response = $guzzleclient->request('POST', 'users', [
    'json' => [
      'token' => $settings->getSetting('authentication_token'),
      'first_name' => $first_name,
      'last_name' => $last_name,
      'email' => $email,
      'email' => $email,
      'password' => $password,
      'password_confirmation' => $password_confirmation,
      'organization_token' => $organization_token
    ]
  ]);
} catch (\GuzzleHttp\Exception\ClientException $e) {
  exceptionHasBeenCaught($e);
}

respondWithData($response);
