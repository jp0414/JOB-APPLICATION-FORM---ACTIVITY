<!-- Database Configuration Code -->
<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "job_application_form";
$dsn = "mysql:host={$host};dbname={$dbname}";
$pdo = new PDO($dsn, $user, $password);

?>