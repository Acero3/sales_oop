<?php
session_start();
include "../classes/product.php";
$product = new Products;
$product_list = $product->getAllProducts();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <title>Product List</title>
</head>
<body>
  <?php
  include "nav.php";
  ?>
  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a href="#" class="navbar-brand"><i class="fa-solid fa-house"></i>Home</a>

      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item text-light">
            <a class="nav-link">Welcome "<?= $_SESSION['username'] ?>"</a>
            </li>
          <li class="nav-item">
            <a href="../actions/logout.php" class="nav-link">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->
<div class="container">
<div class="row mt-5">
  <div class="col-6">
    <h2 class-"mt-5">Product List</h2>
  </div>
  <div class="col-6 ms-auto text-end">
    <!-- ms-auto  and text-end = push element and text inside to right -->
    <h2 class-"mt-5"><a href="../views/add-product.php">Add product</a></h2>
  </div>
</div>

  <table class="table table-striped table-hober">
    <thead class="table-secondary">
      <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th></th>
        <!-- for actions btton -->
      </tr>
    </thead>
    <tbody class="lead">
      <!-- sample row. this will be removed once we write the php code -->
      <?php
      while($product_details = $product_list->fetch_assoc()){
        // print_r ($product_details);
      ?>
      <tr>
        <td><?= $product_details['id']?></td>
        <td><?= $product_details['product_name']?></td>
        <td><?= $product_details['price']?></td>
        <td><?= $product_details['quantity']?></td>
        <td>
          <a href="edit-product.php?product_id=<?= $product_details['id'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
          <a href="../actions/delete-product.php?product_id=<?= $product_details['id'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
          <?php
          if($product_details['quantity']>0){
            ?>
          <a href="../views/buy-product.php?product_id=<?= $product_details['id'] ?>" class="btn btn-success"><i class="fa-solid fa-cash-register"></i></a>
          <?php

          }
          
          ?>

        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>

  <!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->



</body>
</html>