<?php
function getPOSTData() {
  //respond back with the passed in url, and append post data to it for
  //pre-filling of the form.
  $postdata = '';

  foreach($_POST as $key => $value) {
    $postdata .= '&' . $key . '=' . $value;
  }

  return $postdata;
}

function respondWithData($response) {
  $response_message = 'Status code: ' . $response->getStatusCode() . '; Body: ' . (string)$response->getBody();
  $url = "index.php?result=" . $response_message;

  $postdata = getPOSTData();

  header('Location: ' . $url . $postdata);
  exit;
}

function respondWithMessage($message) {
  $url = "index.php?result=" . $message;

  $postdata = getPOSTData();

  header('Location: ' . $url . $postdata);
  exit;
}

function returnFormDataIfExists($formkey) {
  if(isset($_GET[$formkey])) {
    return $_GET[$formkey];
  }

  return '';
}

function exceptionHasBeenCaught($e) {
  $response_message = 'Caught Exception: ' . $e->getResponse()->getStatusCode() . '; ' . $e->getResponse()->getBody();
  respondWithMessage($response_message);
}