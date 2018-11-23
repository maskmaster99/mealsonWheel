<?php

    require "include.php";

    $msg = $_POST["msg"];
    console.log($msg);

    $name = $_POST["ename"];
    $email = $_POST["eemail"];
    $subject = $_POST["esubject"];
    

    if($conn->connect_error){
      die($conn->error);
    }
    else{
      //echo('connection successful');
      $query="insert into enquiry (name,email,subject,message)values('$name','$email','$subject','$msg')";
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
          $mail->Subject = "your enquiry on meals on wheels";
          $mail->Body = $msg;
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
