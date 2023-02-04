<?php
session_start();
include "../classes/product.php";

$product =new Products;
$product_list = $product->getProductDetails($_GET['product_id']);
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


  <title>Edit user</title>
</head>
<body>
<?php
  include "nav.php";
  ?>
  <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a href="../views/dashboard.php" class="navbar-brand">The Company</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              Welcome<?= $_SESSION ['username'] ?>
            </li>
            <li class="nav-item">
            <a href="../actions/logout.php" class="nav-link">Logout</a>
          </li>
          </ul>
        </div>
      </div>
    </nav> -->

    <div class="container">
      <div class="card w-25 mt-5 mx-auto">
        <div class="card-header">
          <h1 class="card-title">Edit Product</h1>
        </div>
        <div class="card-body">
          <form action="../actions/product_actions.php" method="post">
            <input type="hidden" name="id" value="<?= $product_list['id'] ?>">

            <label for="product-name" class="form-label">Product Name</label>
            <input type="text" name="product_name" id="product-name" value="<?= $product_list['product_name']?>" required class="form-control mb-3" autofocus>

            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" value="<?= $product_list['price']?>"  required class="form-control mb-3">

            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" value="<?= $product_list['quantity']?>" required class="form-control mb-3">

            <input type="submit" value="Save" name="btn_save" class="btn btn-primary w-100 mb-3">
            <a href="../views/dashboard.php" value="Cancel" name="btn_cancel" class="btn btn-outline-secondary w-100">Cancell</a>
            <!-- <input type="submit" value="Cancel" name="btn_cancel" class="btn btn-primary w-100"> -->
          </form>
        </div>
      </div>
    </div>
</body>
</html>