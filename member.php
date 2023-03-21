<?php
include("connect.php");

$sql = "SELECT * FROM user";
// use exec() because no results are returned

$stmt =  $mysqli->query($sql);
$list_users = $stmt->fetchAll();
