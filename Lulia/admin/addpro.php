<?php   include "inc/header.php";   ?>
<?php

//poat value

$p_title = @$_POST['p_title'];
$p_category = @$_POST['p_category'];
$p_img = @$_FILES['p_img']['name'];
$p_img_tmp = @$_FILES['p_img']['tmp_name'];
$p_price = @$_POST['p_price'];
$p_desc = @$_POST['p_desc'];
$p_key_word = @$_POST['p_key_word'];


//move uploaded img

    move_uploaded_file($p_img_tmp,"images/$p_img");

//insert pro

if(isset($_POST['addpro'])){

    if(empty($p_title) || empty($p_category) || empty($p_img) || empty($p_price) || empty($p_desc) || empty($p_key_word)){

        echo '<script> alert("Please fill in all fields");</script>';

    }
    if(isset($_POST['addpro'])){

        $insert_pro = "insert into products( p_title , p_category , p_img , p_price , p_desc , p_key_word ) values
            (
                '$p_title',
                '$p_category',
                '$p_img',
                '$p_price',
                '$p_desc',
                '$p_key_word'
            )
        ";

        $run_pro = mysqli_query($db, $insert_pro);

        if(isset($run_pro)){

            header("location: addpro.php");

        }

    }

}



?>
<div class="adminbody">
    <form action="addpro.php" method="post" enctype="multipart/form-data">
        <label>prodact name</label>
        <input type="text" name="p_title">
        <label>Product Type</label>
        <select name="p_category" style="margin-top: 5px;">
            <?php


                $get_c = "select * from category";

                $run_c = mysqli_query($db , $get_c);

                while($row_c = mysqli_fetch_array($run_c)){

                    echo '<option value="'.$row_c['c_id'].'">'.$row_c['c_name'].'</option>';

                }
            
            
            
            
            ?>
        </select>
        <br>
        <label>prodact photo</label>
        <input type="file" name="p_img">
        <label>prodact price</label>
        <input type="text" name="p_price">
        <br>
        <br>
        <label>Product Description</label>
        <textarea name="p_desc"></textarea>
        <script>
            CKEDITOR.replace('p_desc');
        </script>
        <br>
        
        <label>Keywords</label>
        <input type="text" name="p_key_word">
        <br>
        <br>
        <input type="submit" name="addpro" value="Add">
    </form>
</div>

<?php

include "inc/footer.php";

?>