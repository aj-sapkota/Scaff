<?php
require('addon/authentication.php');
echo $_SESSION['email'];
echo $_SESSION['password'];
?>
<h1>Welcome Client Viewer</h1>

<input type="button" value="Log Out" onclick="location='logout.php'" />