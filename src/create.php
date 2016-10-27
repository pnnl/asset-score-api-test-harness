<?php
require_once 'vendor/autoload.php';
require_once 'guzzleclient.php';
require_once 'settings.php';
require_once 'common.php';

$building_name = $_POST['building_name'];
$year_completed = $_POST['year_completed'];
$floor_area = $_POST['floor_area'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$postal_code = $_POST['postal_code'];
$assessment_type = $_POST['assessment_type'];
$use_type = $_POST['use_type'];
$orientation = $_POST['orientation'];
$number_floors = $_POST['number_floors'];
$settings = Settings::getInstance();

if(
  empty($building_name) ||
  empty($year_completed) ||
  empty($floor_area) ||
  empty($street) ||
  empty($city) ||
  empty($state) ||
  empty($postal_code) ||
  empty($assessment_type) ||
  empty($use_type) ||
  empty($orientation) ||
  empty($number_floors)
) {
  respondWithMessage('Nothing to do, one or more fields missing');
}

try {
  $response = $guzzleclient->request('POST', 'preview_buildings.json', [
    'json' => [
      'token' => $settings->getSetting('authentication_token'),
      'building' => [
        'building_name' => $building_name,
        'year_completed' => $year_completed,
        'floor_area' => $floor_area,
        'street' => $street,
        'city' => $city,
        'state' => $state,
        'postal_code' => $postal_code,
        'assessment_type' => $assessment_type,
        'use_type' => $use_type,
        'orientation' => $orientation,
        'number_floors' => $number_floors
      ]
    ]
  ]);
} catch (\GuzzleHttp\Exception\ClientException $e) {
  exceptionHasBeenCaught($e);
}

respondWithData($response);
