<?php

if(isset($_POST["submit"])){
   // echo 'ok';
   
   $name=$_POST["name"];
   $email=$_POST["email"];
   $password=$_POST["password"];
   $password_repeat=$_POST["password_repeat"];

   require_once 'dbh.sub.php';
   require_once 'functions.sub.php';
   
    if(emptyInputRegister($name,$email,$password,$password_repeat) !==false){
          header("location:../ex3.php?error=emptyInput");
          exit();
   
      }
      
     /* if(invalidName($name) !==false){
       header("location:../register.php?error=invalidName");
       exit();
   
   }
   */
   if(invalidEmail($email) !==false){
       header("location:../ex3.php?error=invalidEmail");
       exit();
   
   }
   if(passwordMatch($password,$password_repeat) !==false){
       header("location:../ex3.php?error=passwordNotMatch");
       exit();
   
   }
   if(nameExists($conn,$name) !==false){
       header("location:../ex3.php?error=nameTaken");
       exit();
   
   }

   createUser($conn,$name,$email,$password);


}
else{
    header("location:../ex3.php?error=none");
    exit();
}



?>