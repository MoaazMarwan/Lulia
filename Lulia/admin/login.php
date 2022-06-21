
<?php



//connect db
$con = mysqli_connect('localhost','root','123','userregistration');

//post value

$a_name = @$_POST['a_name'];
$a_pass = @$_POST['a_pass'];

if(isset($_POST['login'])){

if(empty($a_name) OR empty($a_pass)){

echo'<script> alert("Name or Password is empty");</script>';

}
else{
    // get admin name and pass
    $get_admin = "select * from admin where  a_name = '$a_name' AND a_pass = '$a_pass' ";

    $run_admin = mysqli_query($con, $get_admin);

    // admin isset 

    if(mysqli_num_rows($run_admin) == 1) {

        $row_admin = mysqli_fetch_array($run_admin);
        
        // admin value isset

        $aname = $row_admin['a_name'];

        // cookies here

        setcookie("aname", $aname, time()+60*60*24);
        setcookie("adminlogin", 1, time()+60*60*24);

        echo '<script> alert("hello admin");</script>';

        header('location: ok.php');

    }
    else{

        echo'<script> alert(" RONG NAME OR PASSWORD");</script>';

    }
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dashboard</title>
    <link href="css/admin.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
        <div class="login-box">
        <div class="row">
            <div class="col-md-6 login-left">
            <h2>Login Here</h2>
            <form action="ok.php" method="post">
                <div class="form-group">
                    <label style="margin-left:0px;">Username</label>
                    <input type="text" name="a-name" class="form-control"  required>
                </div>
                <div class="form-group">
                    <label style="margin-left:0px;">Password</label>
                    <input type="password" name="a-pass" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">login</button>
                
            </form>
            </div>
        </div>
        </div>
    </div>
</body>
</html>