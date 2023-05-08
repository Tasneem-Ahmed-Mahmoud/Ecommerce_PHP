
<?php  include_once("../../config/paths.php")?>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2" >
  <div class="container">
    <a class="navbar-brand" href="<?=SYSTEM?>">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=SYSTEM?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=SYSTEM.'products.php'?>">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=SYSTEM.'categories.php'?>">Collections</a>
        </li>
       
        <?php
          if(isset($_SESSION['auth'])) :?>



<li class="nav-item">
          <a class="nav-link" href="<?=CLIENT.'cart.php'?>">Cart</a>
        </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?= $_SESSION['user']['name']?>
          </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="<?=CLIENT.'profile.php'?>">Profile</a></li>
            <li><a class="dropdown-item" href="<?=CLIENT.'orders.php'?>">My Orders</a></li>
            <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
            <li><a class="dropdown-item" href="<?=LOGOUT?>">Logout</a></li>
          </ul>
        </li>

        <?php  else:?>
        <li class="nav-item">
          <a class="nav-link" href="<?=REGISTER?>">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=LOGIN?>">Login</a>
        </li>
        <?php  endif?>
       
      </ul>
    </div>
  </div>
</nav>
<?php


?>