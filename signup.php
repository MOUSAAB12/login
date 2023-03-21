<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="signup.css" />
    <title>Document</title>
</head>

<body>
    <form action="sign.php" method="POST" novalidate>
        <h1>Register Now</h1>
        <h3>Track your favorite Tv shows,movies and music</h3>
        <label>username</label>
        <input class="inp" type="text" name="name" placeholder="username"><br>
        <label>email</label>
        <input class="inp" type="email" name="email" placeholder="email"><br>
        <label>password</label>
        <input class="inp" type="password" name="password" placeholder="password"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required><br>

        <label>confirm password</label>
        <input class="inp" type="password" name="confirmpassword" placeholder="confirm password"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required><br>
        <div class="checkbox">
            <input type="checkbox"><span>Remember Me</span>
        </div>
        <div>
            <button type="submit">Sign-up</button>
        </div>
        <p class="link">
            Vous avez un compte ?
            <a class="links" href="login.php">SIGNIN</a>
        </p>
    </form>
</body>

</html>