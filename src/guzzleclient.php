<?php
require_once 'vendor/autoload.php';
require_once 'settings.php';

$settings = Settings::getInstance();

$guzzleclient = new GuzzleHttp\Client(['base_uri' => $settings->getSetting('api_url') . '/api/v2/']);
