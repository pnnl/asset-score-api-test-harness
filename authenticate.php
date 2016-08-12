<?php
require 'vendor/autoload.php';
require 'guzzleclient.php';

$email = $_POST['email'];
$password = $_POST['password'];
$organization_token = $_POST['organization_token'];

if(empty($email) || empty($password) || empty($organization_token)) {
  header("Location: index.php?result=Nothing to do, mising username or password");
}

$response = null;
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
  header("Location: index.php?result=" . $response_message);
}

$response_message = 'Status code: ' . $response->getStatusCode() . '; Body: ' . (string)$response->getBody();
$response_data = json_decode($response->getBody(), true);

file_put_contents('settings', json_encode(['authentication_token' => $response_data['token']]));

header("Location: index.php?result=" . $response_message);
