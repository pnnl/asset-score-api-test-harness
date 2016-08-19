<?php
require 'vendor/autoload.php';
require 'common.php';

function getResult() {
  if(isset($_GET['result'])) {
    return $_GET['result'];
  }
  return 'No results to display';
}
?>

<h2>Authenticate and get a token (POST):</h2>
<form action="authenticate.php" method="post">
  Email: <input type="text" name="email" value="<?=returnFormDataIfExists('email');?>"><br>
  Password: <input type="password" name="password" value="<?=returnFormDataIfExists('password');?>"><br>
  Organization Token: <input type="text" name="organization_token" value="<?=returnFormDataIfExists('organization_token');?>"><br>
  <input type="submit" value="Go"><br>
</form>

<h2>Read a building (GET):</h2>
<form action="read.php" method="post">
  Building ID: <input type="text" name="building_id" value="<?=returnFormDataIfExists('building_id');?>">
  <input type="submit" value="Go"><br>
</form>

<h2>Update a building (PUT):</h2>
<form action="update.php" method="post">
  Building ID: <input type="text" name="building_id" value="<?=returnFormDataIfExists('building_id');?>">
  Key: <input type="text" name="key_to_update" value="<?=returnFormDataIfExists('key_to_update');?>">
  Value: <input type="text" name="value" value="<?=returnFormDataIfExists('value');?>">
  <input type="submit" value="Go">
</form>

<h2>Delete a building (DELETE):</h2>
<form action="delete.php" method="post">
  Building ID: <input type="text" name="building_id" value="<?=returnFormDataIfExists('building_id');?>">
  <input type="submit" value="Go">
</form>

<br>
<h2 style="color:green;">Result box:</h2>
<textarea cols=60 rows=12 style="font-size:14pt;"><?=getResult();?></textarea>
