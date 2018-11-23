<?php

$username = $_POST['cname'];
$password = $_POST['cpassword'];

require "include.php";

if($conn -> connect_error){
  die($conn -> connect_error);
}else{

  $query ="select cid from customer where name='$username' and password =  '$password'";

  $result = $conn -> query($query);

  if($result -> num_rows == 0){
    header('Location:/cozy/customerreg.html');
  }else{
    $row = $result -> fetch_assoc();
    $userid = $row['cid'];
    
    session_start();
    $_SESSION['userid'] = $userid;
    $_SESSION['username'] = $username;
    //header('Location:/fndfrancis/home.php?username='.$username);
    header('Location:/cozy/contributereg.html');
  }


}



?>
