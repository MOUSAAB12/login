<?php
$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "login_db";

// $mysqli = new mysqli($sname, $unmae, $password, $db_name);
session_start();

try {
    $mysqli = new PDO("mysql:host=$sname;dbname=$db_name", $unmae, $password);
    // set the PDO error mode to exception
    $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
