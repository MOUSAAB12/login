<?php
include("connect.php");
$user_id = $_POST['user_id'];

$sql = "DELETE FROM user WHERE id=?";
// use exec() because no results are returned

$stmt = $mysqli->prepare($sql);
$resp = $stmt->execute([$user_id]);
if ($resp) {
    $data = array("status" => "200", "data" => $resp);
    echo json_encode($data);
} else {
    $data = array("status" => "400", "data" => 'error');
    echo json_encode($data);
}
