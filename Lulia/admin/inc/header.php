<?php



//connect db
$db = mysqli_connect('localhost','root','123','userregistration')

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <link href="css/admin.css" rel="stylesheet" type="text/css">
    <script src="inc/ckeditor/ckeditor.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <div class="all">



    <!--- Admin menu --->
        <div class="adminmenu">
            <ul>
                <li><a href="addcat.php">Add Category</a></li>
                <li><a href="addpro.php">Add Product</a></li>
            </ul>
        </div>
    <!--- End admin menu --->
    <br>
</body>
</html>