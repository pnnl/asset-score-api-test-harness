<?php
require_once 'vendor/autoload.php';
require_once 'common.php';
require_once 'settings.php';

$settings = Settings::getInstance();

if(!empty($_POST['api_url'])) {
  $api_url = htmlentities($_POST['api_url'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
  $settings->updateSetting('api_url', $api_url);
}
?>
<a href="index.php">Index</a>

<h2>Update settings:</h2>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
  API URL: <input type="text" name="api_url" value="<?=$settings->getSetting('api_url');?>">
  <input type="submit" value="Save"><br>
</form>
