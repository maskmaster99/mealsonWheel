<?php

    require "include.php";

    $name = $_POST["cname"];
    $email = $_POST["cemail"];
    $password = $_POST["cpassword"];

    if($conn->connect_error){
      die($conn->error);
    }
    else{
      //echo('connection successful');
      $query="insert into customer (name,password,email)values('$name','$password','$email')";
      if($conn->query($query)){
          //echo("connection successful");
          //header('Location: /fndfrancis/login.php?reg=1');
          require("PHPMailer_5.2.0/class.phpmailer.php");

          $mail = new PHPMailer();

          $mail->IsSMTP();                                      // set mailer to use SMTP
          $mail->SMTPDebug=1;
          $mail->SMTPAuth = true;     // turn on SMTP authentication
          $mail->SMTPSecure = 'ssl';
          $mail->Host = "smtp.gmail.com";  // specify main and backup server
          $mail->Port = 465;  // specify main and backup server
          $mail->Username = "sandeshgade21@gmail.com";  // SMTP username
          $mail->Password = "Shruti@9323"; // SMTP password
          $mail->SetFrom("sandeshgade21@gmail.com");
          $mail->IsHTML(true);                                  // set email format to HTML
          $mail->Subject = "volunteer work";
          $mail->Body = "welcome to mealson wheels<br>we have appriciate ur efforts<br>";
          $mail->AddAddress($email);


           if(!$mail->Send())
           {
              echo "Message could not be sent.";
              echo "Mailer Error: " . $mail->ErrorInfo;
              exit;
           }else{
             echo "ERROR:could not able to execute";
           }
           header("location: /cozy/index.html");
      }
      else{
        echo('registration failed'.$conn->error);
      }
    }

 ?>
