<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css" />
    <title>login</title>
</head>

<body>
    <div clas>
        <form action="log.php" method="POST">
            <h1>Login</h1>
            <label>email</label>
            <input type="email" name="email" placeholder="email"><br>
            <label>password</label>
            <input type="password" name="password" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required><br>
            <div class="btn">
                <button type="submit" name="submit">Login</button>
                <!-- <a class="log" href="llogout.php"><button type="submit">Logout</button></a> -->
            </div>
            <div class="checkbox">
                <input type="checkbox"><span>Remember Me</span>
            </div>
            <a href="resetpass.php" class="lien">Forget Password?</a>
            <p class="link">
                Vous n'avez pas un compte ?
                <a class="links" href="signup.php">SIGNUP</a>
            </p>
        </form>
    </div>



</body>

</html>