<?php
$mysqli = require  __DIR__ . "/connect.php";
if (isset($_POST)) {

    session_start();

    $password_hash = md5($_POST["password"]);
    $email = $_POST['email'];
    try {
        $mysqli = new PDO("mysql:host=$sname;dbname=$db_name", $unmae, $password);
        // set the PDO error mode to exception
        $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM user WHERE email = '$email' AND password_hash='$password_hash'";
        // use exec() because no results are returned

        $stmt =  $mysqli->query($sql);
        $user = $stmt->fetchAll();
        $user = $user[0];
        if (count($user) > 0) {

            /*session is started if you don't write this line can't use $_Session  global variable*/

            $_SESSION["user_id"] = $user['id'];
            $_SESSION["email"] = $user['email'];
            $_SESSION["name_user"] = $user['name_user'];
            $_SESSION["password_hash"] = $user['password_hash'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['nationality'] = $user['nationality'];
            $_SESSION['birthday'] = $user['birthday'];
            $_SESSION['adress'] = $user['adress'];
            $_SESSION['country'] = $user['country'];
            $_SESSION['city'] = $user['city'];
            $_SESSION['postal'] = $user['postal'];

            /*session created*/

            header("Location:dashboard.php");
            exit();
        } else {
            echo "<h1> Login failed. Invalid username or password.</h1>";
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
die();
