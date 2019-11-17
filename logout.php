<h1>Log Out</h1>
<?php
session_start();
session_destroy();
?>
<input type="button" value="home" onclick="location= 'index.php'">