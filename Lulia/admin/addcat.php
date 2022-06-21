<?php   include "inc/header.php"; ?>
<?php
// post value

$c_name = @$_POST['c_name'];

// insert category

if(isset($_POST['addcat'])){

    $insert_cat = "insert into category(c_name) values('$c_name')";

    $run_cat = mysqli_query($db, $insert_cat);

    if(isset($run_cat)){

        header("location: addcat.php");

    };

}

?>

<div class="adminbody">
    <form action="addcat.php" method="post">
        <label>Category name</label>
        <input type="text" name="c_name" class="category">
        <input type="submit" name="addcat" value="Add">
    </form>
</div>


<?php   include "inc/footer.php"; ?>