<?php 

	 $name=$email=$password=$repeatpsw="";
	 $emailErr=$nameErr=$passwordErr="";
   function test_input($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
     }
	 if($_SERVER["REQUEST_METHOD"]=="POST"){
       if (empty($_POST["client_email"])) {
      $emailErr = "Email is required";} 
      else {
     $email = test_input($_POST["client_email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
       }
          }
         
         if(empty($_POST['firstname'])){
         	$firstnameErr="First name is required";
         }
         else{

         	$name=test_input($_POST["client_name"]);
          if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed"; 
         }
     }
    if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password= test_input($_POST["password"]);
  }
    if (empty($_POST["confirm-password"])) {
    $passwordErr = "password is required";
  } else  {
    $repeatpsw= test_input($_POST["confirm-password"]);
  }
	 }
    ?>