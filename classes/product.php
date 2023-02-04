<?php
require 'database.php';
class Products extends Database {

  public function AddProduct($product_name, $price, $quantity){
    $sql = "INSERT INTO products(product_name, price, quantity) VALUES ('$product_name', '$price', '$quantity')";

    if($this->conn->query($sql)){
      header('Location:../views/dashboard.php');
      exit;
    }else{
      die("Error add product: ".$this->conn->error);
    }
  }


  public function getAllProducts(){
    $sql = "SELECT * FROM products";
    $result =$this->conn->query($sql);
    if($result){
      return $result;
    }else{
      die ("Error retrieving all products:".$this->conn->error);
    }
  }

  public function getProductDetails($product_id){
    $sql = "SELECT * FROM products WHERE id = $product_id";

    if($result = $this->conn->query($sql)){
      return $result->fetch_assoc(); //fetch_assoc() = Will return the data row into an associative array
    }else{
      die("Error in retrieving product details: " . $this->conn->error);
    }
  }

  public function updateProduct($id, $product_name, $price, $quantity){
    $sql= "UPDATE products SET product_name='$product_name', price=$price, quantity=$quantity WHERE id = $id";
    
    if($this->conn->query($sql)){
      header("Location: ../views/dashboard.php");
    }else{
      die("Error in updating product details".$this->conn->error);
    }
  }

  public function deleteProduct($id){
    $sql = "DELETE FROM products WHERE id= $id";
    if($this->conn->query($sql)){
      header("Location: ../views/dashboard.php");
    }else{
      die("Error deleting product".$this->conn->error);
    }
  }
  public function buyProduct($id, $stock){
    $sql = "UPDATE products SET quantity=quantity-$stock WHERE id = $id";
    if($this->conn->query($sql)){
      header("Location: ../views/dashboard.php");
    }else{
      die("Error buying product".$this->conn->error);
    }
  }

}