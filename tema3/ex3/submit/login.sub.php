<?php
if(isset($_POST["submit"])){
$name=$_POST["name"];
$password=$_POST["password"];

require_once 'dbh.sub.php';
require_once 'functions.sub.php';

if(emptyInputLogin($name,$password) !==false){
    header("location:../login.php?error=emptyinput");
    exit();

}

loginUser($conn,$name,$password);


}
else{
    header("location:../login.php");
    exit();
}