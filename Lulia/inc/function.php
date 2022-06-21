<?php

// connect to server

$connect = mysqli_connect('localhost','root','123','userregistration');


// get ip

function getIp(){

    $ip = $_SERVER['REMOTE_ADDR'];

    if(!empty($_SERVER['HTTP_CLIENT_IP'])){

        $ip = $_SERVER['HTTP_CLIENT_IP'];

    }
    elseif(!empty($SERVER['HTTP_X_FORMARDED_FOR'])) {
        $ip = $SERVER['HTTP_X_FORMARDED_FOR'];
    }

    return $ip;

}


// function cart

function cart(){

    global $connect;

    if(isset($_GET['add_cart'])){

        $ip = getIp();

        $pro_id = (int)$_GET['add_cart'];
    
        $get_cart = "select * FROM cart where ip_add = '$ip' AND p_id = '$pro_id'";

        $run_cart = mysqli_query($connect, $get_cart);

        if(mysqli_num_rows($run_cart) > 0){

            echo '';

        }
        else{

            $insert_cart = "insert into cart(p_id,ip_add) values('$pro_id','$ip')";

            $run_i_cart = mysqli_query($connect, $insert_cart);

            if(isset($run_i_cart)){

                echo '<meta http-equiv="refresh" content="2 ; url=\'index.php\'" />';

            }

        }
  
  
    }

}

// total item

function total_item(){

    if(isset($_GET['add_cart'])){

        global $connect;

        $ip = getIp();

        $get_total = "select * FROM cart where ip_add = '$ip' ";

        $run_total = mysqli_query($connect, $get_total);

        $total_item = mysqli_num_rows($run_total);


    }
    else{


            global $connect;
    
            $ip = getIp();
    
            $get_total = "select * FROM cart where ip_add = '$ip' ";
    
            $run_total = mysqli_query($connect, $get_total);
    
            $total_item = mysqli_num_rows($run_total);

    }
    echo $total_item ;

}

// get total price

function total_price(){

    global $connect;

    $ip = getIp();

    $total = 0;

    $t_price = "select * FROM cart where ip_add = '$ip' ";

    $run_price = mysqli_query($connect, $t_price);

    while($row_t_price = mysqli_fetch_array($run_price)){

        $pro_id_t = $row_t_price['p_id'];

        $price_pro = "select * FROM products where p_id = '$pro_id_t' ";

        $run_price_pro = mysqli_query($connect, $price_pro);

        while($row_price_pro = mysqli_fetch_array($run_price_pro)){

            $pro_price = array($row_price_pro['p_price']);

            $values = array_sum($pro_price);

            $total +=$values;
        }
    }

    echo $total;

}


//get category

function get_cat(){

    global $connect;

    $get_cat = "select * FROM category";

    $run_cat = mysqli_query($connect, $get_cat);

    while($row_cat = mysqli_fetch_array($run_cat)){

        echo '<li><a href="index.php?cat='.$row_cat['c_id'].'">'.$row_cat['c_name'].'</a></li>';

    }
}

// get pro

function get_pro(){

    global $connect;

    if(!isset($_GET['cat'])){

        $get_pro = "select * FROM products";

        $run_pro = mysqli_query($connect, $get_pro);

        while($row_pro = mysqli_fetch_array($run_pro)){

            echo'
            
                <li>
                    <div class="product">
                    <div id="pro-img">
                        <a href="#"><img src="admin/images/'.$row_pro['p_img'].'" width="200px" heigh="150px"/></a>
                    </div>
                    <div id="pro-title">
                        <a href="details.php?id='.$row_pro['p_id'].'">'.$row_pro['p_title'].'</a>
                    </div>
                    <div id="pro-buy">
                        <a href="index.php?add_cart='.$row_pro['p_id'].'"><button>Buy Now</button></a>
                    </div>
                    </div>
                </li>
            
            ';

        }
    }

}
//get product bt category

function get_pro_cat(){


    global $connect;

    if(isset($_GET['cat'])){

        $cat = (int)$_GET['cat'];

        $get_pro_cat = "select * FROM products where p_category = '$cat' ";

        $run_pro_cat = mysqli_query($connect, $get_pro_cat);

        if(mysqli_num_rows($run_pro_cat) > 0){

            while($row_pro_cat = mysqli_fetch_array($run_pro_cat)){

                echo'
        
                    <li>
                        <div class="product">
                        <div id="pro-img">
                            <a href="#"><img src="admin/images/'.$row_pro_cat['p_img'].'" width="200px" heigh="150px"/></a>
                        </div>
                        <div id="pro-title">
                            <a href="#">'.$row_pro_cat['p_title'].'</a>
                        </div>
                        <div id="pro-buy">
                            <a href="#"><button>Buy Now</button></a>
                        </div>
                        </div>
                    </li>
            
                ';

            }

        }
        else{

            echo '<div class="error">There is no products yet</div>';

        }

    }

}

?>