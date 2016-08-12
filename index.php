<?php
require 'vendor/autoload.php';


function getResult() {
  if(isset($_GET['result'])) {
    return $_GET['result'];
  }
  return 'No results to display';
}
?>

<h2>Authenticate and get a token (POST):</h2>
<form action="authenticate.php" method="post">
  Email: <input type="text" name="email"><br>
  Password: <input type="password" name="password"><br>
  Organization Token: <input type="text" name="organization_token"><br>
  <input type="submit" value="Go"><br>
</form>

<h2>Read a building (GET):</h2>
<form action="read.php" method="post">
  Building ID: <input type="text" name="building_id"> <input type="submit" value="Go"><br>
</form>

<br>
<h2 style="color:green;">Result box:</h2>
<textarea cols=60 rows=12 style="font-size:14pt;"><?=getResult();?></textarea>
