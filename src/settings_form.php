<?php
require_once 'vendor/autoload.php';
require_once 'common.php';
require_once 'settings.php';

$settings = Settings::getInstance();

if(!empty($_POST['api_url'])) {
  $api_url = filter_var($_POST['api_url'], FILTER_VALIDATE_URL);
  if($api_url != false) {
    $settings->updateSetting('api_url', $api_url);
  } else {
    print '<h3 style="color:red">Not a valid URL</h3>';
  }
}
?>
<a href="index.php">Index</a>

<h2>Update settings:</h2>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
  API URL: <input type="text" name="api_url" value="<?=$settings->getSetting('api_url');?>">
  <input type="submit" value="Save"><br>
</form>
