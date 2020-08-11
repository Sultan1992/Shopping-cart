

<?php

session_start();
require_once('database.php');
require_once('component.php');
$db=new craeteDb("productdb","productTb");
if(isset($_POST['remove'])){
    if($_GET['action']=='remove'){
        foreach($_SESSION['cart']as $key=>$value){

            if($value['product_id']==$_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script> alert('Product has been removed')</script>";
                echo "<script> window.location='cart.php'</script>";
            
           
            }
        }
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./style.css">
</head>
<body class="big-light">
<?php
require_once('header.php');
?>
<div class="container-fluid">
<div class ='row px-5 '>
<div class="col-md-7">

<div class="shopping-cart">
<h6>My cart</h6>
<hr>
<?php
 $total=0;
if(isset($_SESSION['cart'])){
$product_id=array_column($_SESSION['cart'],'product_id');
$result=$db->getData();
while($row=mysqli_fetch_assoc($result)){
    foreach($product_id as $id){
        if($row['id']==$id){
            cartElement($row['product_image'],$row['product_name'],$row['product_price'],$row['id']);
            $total=$total+(int)$row['product_price'];
       
        }
    }
}
}else{
    echo "<h5>Cart emptiy</h5>";
}
?>
</div>
    </div>
<div class="col-md-4 offset-md-1 baroder rounded mt-5 bg-white h-25"> 
<div class="pt-4">

 <h6>Peice details</h6>
 <hr>
 <div class="row price-details">
 <div class="col-md-6">
 <?php


 if(isset($_SESSION['cart'])){

    $count=count($_SESSION['cart']);
    echo "<h6>Price($count items)</h6>";
 }else{

    echo "<h6>Price(0 items)</h6>";
 }
 ?>
 <h4> Shipping cost</h4>
 <hr>
 <h4> Amaount payable</h4>
 </div>
 
 <div class="col-md-6">
 <h6>$<<?php echo $total ?></h6>
 <h6 class="text-success">FREE</h6>
 <hr>
 <h6>
 <?php

 echo $total;
 ?>
 
 </h6>
 </div>
 </div>
 </div>
</div>
    </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
</body>
</html>