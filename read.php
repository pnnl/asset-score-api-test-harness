<?php
require 'vendor/autoload.php';
require 'guzzleclient.php';

$iBuildingID = $_POST['building_id'];

if(empty($iBuildingID)) {
  header("Location: index.php?result=Nothing to do, no building id passed in");
}

$setting_data = file_get_contents('settings');
$setting_data = json_decode($setting_data, true);

$response = $guzzleclient->request('GET', 'preview_buildings/' . $iBuildingID . '.json', [
  'json' => [
    'token' => $setting_data['authentication_token']
  ]
]);

$response_message = 'Status code: ' . $response->getStatusCode() . '; Body: ' . (string)$response->getBody();

header("Location: index.php?result=" . $response_message);
