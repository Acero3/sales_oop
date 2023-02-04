<?php
include '../classes/product.php';
// also can use erquire

$product = new Products();

if (isset($_POST['btn_add'])){
  $product_name = $_POST['product_name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];

  $product->AddProduct($product_name, $price, $quantity);
}

if (isset($_POST['btn_save'])){
  $id = $_POST['id'];
  $product_name = $_POST['product_name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];

  $product->updateProduct($id, $product_name, $price, $quantity);
}

if (isset($_POST['btn_pay'])){
  $buy_quantity = $_POST['quantity'];
  // $stock = $quantity - $buy_quantity;
  // $product->buyProduct($id, $price, $quantity);
  $product->buyProduct($_GET['product_id'], $buy_quantity);
  // echo "test";
}
?>