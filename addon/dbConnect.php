

<?php
/* Host name of the MySQL server */
$host = 'localhost';
/* MySQL account username */
$user = 'root';
/* MySQL account password */
$passwd = '';
/* The schema you want to use */
$schema = 'scaffolding_team';
/* The PDO object */
//$pdo = NULL;
/* Connection string, or "data source name" */
$dsn = 'mysql:host=' . $host . ';dbname=' . $schema;
/* Connection inside a try/catch block */
try {
	/* PDO object creation */
	$connect = new PDO($dsn, $user,  $passwd);

	/* Enable exceptions on errors */
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	/* If there is an error an exception is thrown */
	die('Database connection failed.');
}
?>