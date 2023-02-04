<?php
require 'database.php';
class User extends Database {
  public function createUser($first_name, $last_name, $username, $password)
  {
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$encrypted_password')";

    if($this->conn->query($sql)){
      header('Location:../views');
      exit;
    }else{
      die ("Error creating user: ".$this->conn>error);
    }
  }


  public function login($username, $password){
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $this->conn->query($sql);

    if($result->num_rows == 1){
      $user_details = $result->fetch_assoc();
      $is_password_correct = password_verify($password, $user_details["password"]);
      if($is_password_correct){
        session_start();
        $_SESSION["user_id"]=$user_details["id"];
        $_SESSION["username"]=$user_details["username"];

        header ("Location:../views/dashboard.php");
        exit;
      }else{
        die ("password is incorrect.");
      }
    }else{
      die("Username doesn't exist.");
    }
  }



  public function getAllUsers($user_id){
    $sql = "SELECT * FROM users WHERE id != $user_id";
    $result =$this->conn->query($sql);
    if($result){
      return $result;
    }else{
      die ("Error retrieving all users:".$this->conn->error);
    }
  }
}

// trial
function updatePhoto($user_id, $photo_name, $photo_tmp){
  $conn = connection();
  $sql = "UPDATE users SET photo = '$photo_name' where id = $user_id";

  if($conn -> query($sql)){
    $destination = "img/$photo_name";
    move_uploaded_file($photo_tmp, $destination);
    // move_uploaded_file();->buil-in function

    // $photo_tmp = stored to where, new file such as img.
    // $destination = stored from where, old 

    header("refresh: 0");}
    else{
      die("Error uploading photo: ".$conn -> error);
    }

  }


  if(isset($_POST['btn_upload_photo'])){
    $user_id = $_SESSION['user_id'];
    $photo_name = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];


    updatePhoto($user_id, $photo_name, $photo_tmp);

    // ['name'] = file name of the photo(photo1.jpg)..
    // ['tnp_name] =location of the temporary file
  }

?>