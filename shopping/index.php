

<?php
//create session
session_start();
require_once("component.php");
require_once("database.php");



//create instance 
$database=new craeteDb("productdb","productTb");

if(isset($_POST['add'])){


 if(isset($_SESSION['cart'])){
    array_column($_SESSION['cart'],"product_id") ;
    if(in_array($_POST['product_id'],$item_array_id)){
     
        echo "s<cript>alart('Product id is added to the cart')</script>";

        echo "s<cript>window.location='index.php'</script>";
    }else{
      $count=  count($_SESSION['cart']);
      $item_array=array(
        'product_id'=>$_POST['product_id']

      );
      $_SESSION['cart'][$count]=$item_array;
      print_r($_SESSION['cart']);
    }
 
 }else{
     $item_array=array(
         'product_id'=>$_POST['product_id']

     );
     //create new seession varaiable.
     $_SESSION['cart'][0]=$item_array;
     print_r($_SESSION['cart']);
 }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommmerce system</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./style.css">
</head>
<body>

<?php
require_once("header.php");
?>



<div class="container">
    <div class="row text-center py-5">
<?php
$result=$database->getData();
while($row=mysqli_fetch_assoc($result)){
    component($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
}

?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>