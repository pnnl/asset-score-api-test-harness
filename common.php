<?php

function respond($url) {
  //respond back with the passed in url, and append post data to it for
  //pre-filling of the form.
  $postdata = '';

  foreach($_POST as $key => $value) {
    $postdata .= '&' . $key . '=' . $value;
  }

  header('Location: ' . $url . $postdata);
  exit;
}

function returnFormDataIfExists($formkey) {
  if(isset($_GET[$formkey])) {
    return $_GET[$formkey];
  }

  return '';
}
