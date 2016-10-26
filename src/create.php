<?php
require_once 'vendor/autoload.php';
require_once 'guzzleclient.php';
require_once 'settings.php';
require_once 'common.php';

$building_name = htmlentities($_POST['building_name'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
$year_completed = htmlentities($_POST['year_completed'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
$floor_area = htmlentities($_POST['floor_area'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
$street = htmlentities($_POST['street'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
$city = htmlentities($_POST['city'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
$state = htmlentities($_POST['state'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
$postal_code = htmlentities($_POST['postal_code'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
$assessment_type = htmlentities($_POST['assessment_type'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
$use_type = htmlentities($_POST['use_type'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
$orientation = htmlentities($_POST['orientation'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
$number_floors = htmlentities($_POST['number_floors'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
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
