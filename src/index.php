<?php
require_once 'vendor/autoload.php';
require_once 'common.php';

function getResult() {
  if(isset($_GET['result'])) {
    return $_GET['result'];
  }
  return 'No results to display';
}
?>
<a href="settings_form.php">Settings</a>

<h2>Authenticate and get a token (POST):</h2>
<form action="authenticate.php" method="post">
  Email: <input type="text" name="email" value="<?=returnFormDataIfExists('email');?>"><br>
  Password: <input type="password" name="password" value="<?=returnFormDataIfExists('password');?>"><br>
  Organization Token: <input type="text" name="organization_token" value="<?=returnFormDataIfExists('organization_token');?>"><br>
  <input type="submit" value="Go"><br>
</form>

<h2>Index of all my buildings (GET):</h2>
<form action="allbuildings.php" method="post">
  <input type="submit" value="Go"><br>
</form>

<h2>Create a building (POST):</h2>
<form action="create.php" method="post">
  Building Name: <input type="text" name="building_name" value="<?=returnFormDataIfExists('building_name');?>"><br>
  Year Completed: <input type="text" name="year_completed" value="<?=returnFormDataIfExists('year_completed');?>"><br>
  Floor Area: <input type="text" name="floor_area" value="<?=returnFormDataIfExists('floor_area');?>"><br>
  Street: <input type="text" name="street" value="<?=returnFormDataIfExists('street');?>"><br>
  City: <input type="text" name="city" value="<?=returnFormDataIfExists('city');?>"><br>
  State: <input type="text" name="state" value="<?=returnFormDataIfExists('state');?>"><br>
  Postal Code: <input type="text" name="postal_code" value="<?=returnFormDataIfExists('postal_code');?>"><br>
  Assessment Type: <input type="text" name="assessment_type" value="<?=returnFormDataIfExists('assessment_type');?>"><br>
  Use Type: <input type="text" name="use_type" value="<?=returnFormDataIfExists('use_type');?>"><br>
  Orientation: <input type="text" name="orientation" value="<?=returnFormDataIfExists('orientation');?>"><br>
  Number Of Floors: <input type="text" name="number_floors" value="<?=returnFormDataIfExists('number_floors');?>"><br>
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
  Field: <input type="text" name="field_to_update" value="<?=returnFormDataIfExists('field_to_update');?>">
  Value: <input type="text" name="value" value="<?=returnFormDataIfExists('value');?>">
  <input type="submit" value="Go">
</form>

<h2>Delete a building (DELETE):</h2>
<form action="delete.php" method="post">
  Building ID: <input type="text" name="building_id" value="<?=returnFormDataIfExists('building_id');?>">
  <input type="submit" value="Go">
</form>

<h2>Validate a building (GET):</h2>
<form action="validate.php" method="post">
  Building ID: <input type="text" name="building_id" value="<?=returnFormDataIfExists('building_id');?>">
  <input type="submit" value="Go">
</form>

<h2>Simulate a building (GET):</h2>
<form action="simulate.php" method="post">
  Building ID: <input type="text" name="building_id" value="<?=returnFormDataIfExists('building_id');?>">
  <input type="submit" value="Go">
</form>

<h2>Get Building Report (GET):</h2>
<form action="report.php" method="post">
  Building ID: <input type="text" name="building_id" value="<?=returnFormDataIfExists('building_id');?>">
  <input type="submit" value="Go">
</form>

<h2 style="color:green;">Result box:</h2>
<textarea cols=60 rows=10 style="font-size:14pt;"><?=getResult();?></textarea>
