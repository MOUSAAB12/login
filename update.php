<?php
$mysqli = require  __DIR__ . "/connect.php";


try {

    $mysqli = new PDO("mysql:host=$sname;dbname=$db_name", $unmae, $password);
    // set the PDO error mode to exception
    $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_SESSION["user_id"];
    $sql = "SELECT * FROM user WHERE id = $id ";
    $stmt =  $mysqli->query($sql);
    $user = $stmt->fetchAll();
    $user = $user[0];
    $id = $user['id'];



    // if (isset($_POST["submit"])) {


    if (strlen($_POST["cpassword"]) == 0 || strlen($_POST["newpassword"]) == 0 || strlen($_POST["repassword"]) == 0) {
        echo  "<p>fields empty!</p>";
    } elseif ($_POST["cpassword"] === $_POST["newpassword"]) {
        echo  "your password Already exist";
    } elseif ($_POST["newpassword"] != $_POST["repassword"]) {
        echo "unmatch password";
    } else {
        $cpassword = md5($_POST["cpassword"]);
        if ($user['password_hash'] === $cpassword) {
            $new = md5($new);
            $sql = "UPDATE user SET password_hash = '$new' WHERE id = $id ";
            $stmt =  $mysqli->query($sql);
            $user = $stmt->execute();
            if ($user === TRUE) {
                header("Location:login.php");
                exit();
            } else {
                echo "Error updating record: " . $mysqli->error;
            }
        } else {
            echo "error";
        }
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
