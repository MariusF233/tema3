<?php

function emptyInputRegister($name,$email,$password,$password_repeat){

    $result=false;
    if(empty($name)||empty($email)||empty($password)||empty($password_repeat)){
     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}
/*function invalidName($name){

    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/"),$name)
    {

     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}
*/
function invalidEmail($email){

    $result=false;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {

     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}
function passwordMatch($password,$password_repeat){

    $result=false;
    if($password!==$password_repeat)
    {

     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}

function nameExists($conn,$name){
//functia are 2 scopuri
//pentru register,nu ma lasa sa fac un cont nou cu un nume deja existent
//pentru login,caut numele in tabela users,iau parola lui si vad daca a introdus parola corect
    $sql="SELECT * FROM users WHERE usersName= ?;";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../ex3.php?error=statementFailed");
        exit();
    }
    mysqli_stmt_bind_param($statement,"s",$name);//punem in statement numele in loc de ?
    mysqli_stmt_execute($statement);

    $resultData=mysqli_stmt_get_result($statement);
    if($row = mysqli_fetch_assoc($resultData)){
return $row;
//returneaza un row,deci o sa pot vedea si parola
    }
else{
    $result=false;
    return $result;
}
mysqli_stmt_close($statement);
}


function createUser($conn,$name,$email,$password){
   
    $sql="INSERT INTO users (usersName,usersEmail,usersPassword) VALUES (?,?,?);";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../ex3.php?error=statementFailed");
        exit();
    }
    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
//nu salvam parola clara
    mysqli_stmt_bind_param($statement,"sss",$name,$email,$hashedPassword);
    mysqli_stmt_execute($statement);


mysqli_stmt_close($statement);

header("location:../ex3.php?error=none");
exit();
}

function emptyInputLogin($name,$password){

    $result=false;
    if(empty($name)||empty($password)){
     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}
function loginUser($conn,$name,$password){
    
    $nameExists=nameExists($conn,$name);

    if($nameExists==false){
        header("location:../login.php?error=wrongName");
      exit();

    }

    $hashedPassword=$nameExists["usersPassword"];
    //nameExists returneaza un row si putem lua parola lui,dar hashuita
    $checkPassword=password_verify($password,$hashedPassword);
    //nu se poate unhash password,folosim doar password_verify

    if($checkPassword===false){
        header("location:../login.php?error=wrongPassword");
        exit();
        //verificam daca parola e corecta
    }
    else if($checkPassword==true){
        session_start();
         
        //deschidem o sesiune si dam un username de sesiune
        $_SESSION["userName"]=$nameExists["usersName"];
       
        header("location:../login.php");
        exit();
    }
}

?>