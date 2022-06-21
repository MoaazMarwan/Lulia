<?php   include "files/header.php"  ;?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>user</title>
</head>
<body>
    <div class="container">
        <div class="login-box">
        <div class="row">
            <div class="col-md-6 login-left">
            <a href="admin/login.php" class="btn btn-primary">admin</a>
            <h2>Login Here</h2> 
            <form action="validation.php" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="user" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">login</button>
                
                
            </form>
            </div>
            <div class="col-md-6 login-right">
            <h2>Register Here</h2>
            <form action="registration.php" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="user" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" name="number" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">register</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    <?php

include "files/footer.php";

?>
</body>
</html>