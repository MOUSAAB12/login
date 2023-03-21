<?php
session_start()
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
    <form action="update.php" method="POST">
        <h1>Change your Password</h1>
        <label>Current Password</label>
        <input type="password" name="cpassword" placeholder="Current password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required><br>
        <label>New Password</label>
        <input type="password" name="newpassword" placeholder="New password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required><br>
        <label>Comfirm Password</label>
        <input type="password" name="repassword" placeholder="confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required><br>
        <button type="submit" name="submit">Reset your Password</button>

    </form>
</body>

</html>