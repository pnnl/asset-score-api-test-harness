<?php
require 'vendor/autoload.php';
require 'guzzleclient.php';
require 'common.php';
require 'settings.php';

$building_id = $_POST['building_id'];
$settings = Settings::getInstance();

if(empty($building_id)) {
  respond("index.php?result=Nothing to do, no building id passed in");
}

$response = $guzzleclient->request('GET', 'preview_buildings/' . $building_id . '.json?token=' . $settings->getSetting('authentication_token'));

$response_message = 'Status code: ' . $response->getStatusCode() . '; Body: ' . (string)$response->getBody();

respond("index.php?result=" . $response_message);
