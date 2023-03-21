<?php
include("connect.php");
if (isset($_POST)) {
    if (empty($_POST["name"])) {
        die("name is required");
    }
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("valid email is required");
    }
    if (strlen($_POST["password"]) < 8) {
        die("password must be at least 8 characters");
    }
    if (!preg_match("/[a-z]/i", $_POST["password"])) {
        die("password must $mysqlitain at least one letter");
    }
    if (!preg_match("/[0-9]/i", $_POST["password"])) {
        die("password must $mysqlitain at least one number");
    }
    if ($_POST["password"] == $_POST["cpassword"]) {
        die("password must match");
    }
    $password_hash = md5($_POST["password"]);
    $name_user = $_POST['name'];
    $email = $_POST['email'];

    try {
        $mysqli = new PDO("mysql:host=$sname;dbname=$db_name", $unmae, $password);
        // set the PDO error mode to exception
        $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     // $sql = "SELECT * FROM user";
        $sql = "INSERT INTO user (name_user, email, password_hash)
        VALUES ('$name_user','$email','$password_hash')";
        // use exec() because no results are returned
        if ($mysqli->exec($sql)) {
            header("Location:login.php");
            exit();
        } else {
            if ($mysqli->errno === 1062) {
                die("email already taken");
            } else {
                die($mysqli->error . " " . $mysqli->errno);
            }
        }

        // $stmt =  $mysqli->query($sql);
        // $user = $stmt->fetch();

        // var_dump($user);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    // try {
    //     $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    //     $name_user = $_POST['name'];
    //     $email = $_POST['email'];
    //     $sql = "INSERT INTO user ($name_user, $email, $password_hash) VALUES (?, ?, ?)";

    //     $stmt = mysqli_stmt_init($mysqli);
    //     var_dump($password_hash, $name_user, $email, $sql);
    //     if (mysqli_stmt_prepare($stmt, $sql)) {
    //         // die("SQL error:" . mysqli_$mysqlinect_errno($mysqli));
    //         mysqli_stmt_bind_param($stmt, "sss", $_POST["name"], $_POST["email"], $password_hash);
    //         mysqli_stmt_execute($stmt);
    //     }
    // } catch (Exception $e) {
    //     echo 'Message: ' . $e->getMessage();
    // }


    // echo "signup successful";
}
die();



// $name_user = $_POST['name'];
// $email = $_POST['email'];