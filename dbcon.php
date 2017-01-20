<?php
$host = "localhost";
$dbname = "dragndrop";
$user = "root";
$pass = "root";

try {
$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
