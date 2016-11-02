<?php
function getPOSTData() {
  //respond back with the passed in url, and append post data to it for
  //pre-filling of the form.
  $postdata = '';

  foreach($_POST as $key => $value) {
    $postdata .= '&' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '=' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
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
    return htmlentities($_GET[$formkey], ENT_QUOTES | ENT_HTML5, 'UTF-8');
  }

  return '';
}

function exceptionHasBeenCaught($e) {
  $response_message = 'Caught Exception: ' . $e->getResponse()->getStatusCode() . '; ' . $e->getResponse()->getBody();

  respondWithMessage($response_message);
  exit;
}
