<?php
$mysqli = require  __DIR__ . "/connect.php";


try {
    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "<p>Invalid email address please type a valid email address!</p>";
            echo 'ok' .  $error;
        } elseif (empty($email)) {
            $error['email'] = "Email Required";
            echo 'ok' .  $error;
        } else {
            $mysqli = new PDO("mysql:host=$sname;dbname=$db_name", $unmae, $password);
            // set the PDO error mode to exception
            $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM user WHERE email = '$email' ";
            $stmt =  $mysqli->query($sql);
            $user = $stmt->fetch();
            var_dump($user);
            $token = $user['token'];

            // $this->sendPasswordRessetlink($email, $token);
            header("Location:forget.php");
            exit();
        }
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
