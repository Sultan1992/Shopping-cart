
<header id="header">

<nav class="navbar navbar-expand-lg navabr-dark bg-dark">
<a href="index.php" class="navbar-brand">
    <h3 class="px-s">
    <i class="fas fa-shopping-basket"></i>Shopping cart
    </h3>
   </a>
   <button class="navbar-toggler"
   
   type="button" 
   data-toggle="collpse"
   data-target="#navbarNavAltMarkup"
   data-controls="navbarNavAltMarkup"
   arial-expanded="false"
   arial-lable="Taggle navigation">
   <span class="navbar-taggler-icon"></span>
   
   </button>
   <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

<div class="mr-auto"></div>
<div class="navbar-nav">
<a href ="cart.php"class=nav-item nav-link active">
<h5 class="px-5 cart">
<i class="fas fa-shopping-cart"></i>Cart 
<?php
if(isset($_SESSION['cart'])){
    $count=count($_SESSION['cart']);
    echo "<span id='cart_count'class='text-warning bg-light'>$count</span>";
}else{
    echo "<span id='cart_count'class='text-warning bg-light'>0</span>";

}
?>
</h5>
</a>
</div>
       </div>
</nav>
</header>