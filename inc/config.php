<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');

session_start();

require_once 'functions.php';

$servername = "us-cdbr-east-05.cleardb.net";
$username = "ba8b24db33896d";
$password = "2ea3ef65";
$database = "heroku_7411146605ac331";

// $servername = "localhost";
// $username = "root";
// $password = "root";
// $database = "testapp";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	//echo '<IMG src="img/wait.png"; />';
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
