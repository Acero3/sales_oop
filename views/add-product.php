<?php
session_start();
//include "../classes/product.php";
//$product =new Products;

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

  <title>Add Product</title>
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

  <div class="card mt-5 w-25 mx-auto">
    <div class="card-header">
      <h1 class="text-success">Add Product</h1>
    </div>

    <div class="card-body">
      <form action="../actions/product_actions.php" method="post">
        <!-- "../actions/product_action.php" will receive the data first then pass to database  -->
        <label for="product-name">Product Name</label>
        <input type="text" class="form-control" name="product_name" placeholder="Pen" id="product-name">
        <div class="row">
          <div class="col-6">
            <label for="product-name">Price</label>
            <input type="number" class="form-control" name="price" placeholder="$1.0" id="price">
          </div>
          <div class="col-6">
            <label for="product-name">Quantity</label>
            <input type="number" class="form-control" name="quantity" placeholder="12" id="quantity">
          </div>
        </div>
        <div>
          <button type="submit" class="btn btn-success w-100 mt-5" name="btn_add">Add</button>
        </div>
      </form>
    </div>
    
  </div>
  </div>
</body>
</html>