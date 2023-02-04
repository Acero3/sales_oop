<?php
session_start();
require '../classes/product.php';
$product = new Products();

if(isset($_GET['product_id'])){
  $product->deleteProduct($_GET['product_id']);
  header("Location: ../views/dashboard.php");
}
?>