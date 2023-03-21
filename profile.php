<?php
$mysqli = require  __DIR__ . "/connect.php";
try {
    $mysqli = new PDO("mysql:host=$sname;dbname=$db_name", $unmae, $password);
    // set the PDO error mode to exception
    $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!empty($_POST)) {

        $id = $_SESSION['user_id'];
        $name_user = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'] ? $_POST['phone'] : ' ';
        $nationality = $_POST['nationality'] ? $_POST['nationality'] : ' ';
        $birthday = $_POST['birthday'] ? $_POST['birthday'] : ' ';
        $adress = $_POST['adress'] ? $_POST['adress'] : ' ';
        $country = $_POST['country'] ? $_POST['country'] : ' ';
        $city = $_POST['city'] ? $_POST['city'] : ' ';
        $postal = $_POST['postal'] ? $_POST['postal'] : ' ';

        $sql = "select * from user where id='$id'";
        $stmt = $mysqli->query($sql);
        $row = $stmt->fetchAll();
        $row = $row[0];
        $res = $row['id'];
        if ($res === $id) {

            $update = "UPDATE user SET email='$email',phone='$phone',nationality='$nationality',name_user='$name_user',birthday='$birthday',adress='$adress',country='$country',city='$city',postal='$postal' WHERE id=$id";
            $sql2 = $mysqli->query($update);
            $update_user = $sql2->fetchAll();

            if ($sql2) {
                /*Successful*/
                $stmt = $mysqli->query($sql);
                $user = $stmt->fetchAll();
                $user = $user[0];
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



                header('location:Dashboard.php');
            } else {
                /*sorry your profile is not update*/
                echo "sorry your profile is not update";
            }
        } else {
            /*sorry your id is not match*/
            echo "sorry your id is not match";
        }
    } else {
        echo "Empty fileds";
    }
    // $stmt =  $mysqli->query($sql);
    // $user = $stmt->fetch();

    // var_dump($user);
} catch (PDOException $e) {
    echo $e->getMessage();
}
