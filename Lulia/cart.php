<?php include"files/header.php";?><?php
session_start();?><form action=""method="post"><table style="width: 100%;height: 200%;background:#fff;border: 0;border:1px solid rgb(199, 197, 197);padding:10px;margin-top: 118px;margin-bottom: 118px;"><tr align="center"><th>product</th><th>the number</th><th>price</th></tr><?php
global $connect;$ip=getIp();$total=0;$t_price="select * FROM cart where ip_add = '$ip' ";$run_price=mysqli_query($connect,$t_price);while($row_t_price=mysqli_fetch_array($run_price)){$pro_id_t=$row_t_price['p_id'];$price_pro="select * from products where p_id = '$pro_id_t' ";$run_price_pro=mysqli_query($connect,$price_pro);while($row_price_pro=mysqli_fetch_array($run_price_pro)){$pro_price=array($row_price_pro['p_price']);$pro_title=$row_price_pro['p_title'];$pro_img=$row_price_pro['p_img'];$pro_price_single=$row_price_pro['p_price'];$values=array_sum($pro_price);$total+=$values;?><tr align=center><td><div><?php echo $pro_title;?></div><img width="70px"src="admin/images/<?php echo $pro_img;?>"></td><td><input type="text"name="qty"size="5"value="<?php echo @$_SESSION['qty']; ?>"></td><?php
if(isset($_POST['update_cart'])){$qty=@$_POST['qty'];$update_qty="update cart set qty = '$qty'";$run_u_qty=mysqli_query($connect,$update_qty);$_SESSION['qty']=$qty;$total=$total*$qty;}?><td><?php echo $pro_price_single;?>EG</td></tr><?php}}?><tr><th>total price:<?php echo $total;?>EG</th></tr><tr><td><input type="submit"name="update_cart"value="save changes"></td><td><button class="continue"><a href="index.php">Continue Shopping</a></button></td><?php
if($login_coo==1){echo'<td><button><a href="email.html">Finish shopping</a></button></td>';}
else{echo'<td><button><a href="login.php">Finish shopping</a></button></td>';}?></tr></table></form><?php include"files/footer.php";?>