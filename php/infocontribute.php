<?php

session_start();
$customerid = $_SESSION['userid'];
$items = $_POST['items'];

require "include.php";

if($conn -> connect_error){
  die($conn -> connect_error);
}else{

  $query ="insert into contribute(coid , items) values('$customerid','$items') ";

  $result = $conn -> query($query);

  if($result){
    header('Location:/cozy/index.html');
  }else{
    //$row = $result -> fetch_assoc();
    //$userid = $row['cid'];
    echo "please try again later";
    //session_start();
    //$_SESSION['userid'] = $userid;
    //$_SESSION['username'] = $username;
    //header('Location:/fndfrancis/home.php?username='.$username);
    //header('Location:/cozy/contributereg.html');
  }


}


 ?>
