<?php

/**
 * Website: www.TutorialsClass.com
 **/

if (!empty($_POST["remember"])) {
    setcookie("email", $_POST["email"], time() + 3600);
    setcookie("password", $_POST["password"], time() + 3600);
    echo "Cookies Set Successfuly";
} else {
    setcookie("email", "");
    setcookie("password", "");
    echo "Cookies Not Set";
}

?>

<p><a href="page1.php"> Go to Login Page </a> </p>