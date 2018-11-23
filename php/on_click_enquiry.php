<?php
//require"include.php";

//$name=$_POST['name'];
//$email=$_POST['email'];
     $contact=$_POST['contact'];
//$datee = htmlentities($_POST['datee']);
$rawdate = htmlentities($_POST['datee']);
$datee = date('Y-m-d', strtotime('$rawdate'));
//$datee=$_POST['todays_date'];
$enquiry=$_POST['message'];



$sql = "INSERT INTO enquiry (email, p_name, p_phone,description,datee) VALUES
            ('$email', '$name',$contact,'$enquiry','$datee')";
if(mysqli_query($conn, $sql)){
    //echo "Records added successfully.";



    require("../../PHPMailer_5.2.0/class.phpmailer.php");

    $mail = new PHPMailer();

    $mail->IsSMTP();                                      // set mailer to use SMTP
    $mail->SMTPDebug=1;
    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";  // specify main and backup server
    $mail->Port = 465;  // specify main and backup server
    $mail->Username = "sandeshgade21@gmail.com";  // SMTP username
    $mail->Password = "Shruti@9323"; // SMTP password
    $mail->SetFrom("coder3366@gmail.com");
    $mail->IsHTML(true);                                  // set email format to HTML
    $mail->Subject = "volunteer work";
    $mail->Body = "welcome to mealson wheels<br><br>

    ;


    $query="select * from admin";
    $result = mysqli_query($conn, $query);

    while ($row = $result-> fetch_assoc()) {
      //echo($row['email']);
      $mail->AddAddress($row['admin_email']);

    }
   //$mail->AddAddress();

   header("location: /edu_site/index.html");

    if(!$mail->Send())
    {
       echo "Message could not be sent.";
       echo "Mailer Error: " . $mail->ErrorInfo;
       exit;
    }




} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

 ?>
