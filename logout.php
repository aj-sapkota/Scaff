<h1>Log Out</h1>
<?php
session_start();
session_destroy();
header('Location: index.php');
?>