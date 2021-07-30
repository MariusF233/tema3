

<div class="register_section">
        <h1>REGISTER</h1>

        <form  action="submit/register.sub.php" method="post" enctype="multipart/form-data">
           

            <label  >name:</label>
            <input type="text" name="name"  placeholder="your name" />
            
            <label >email:</label>
            <input type="email" name="email"  placeholder="your email" />

            <label >password:</label>
            <input type="password" name="password"  placeholder="your password" />
             
            <label >retype password:</label>
            <input type="password" name="password_repeat"  placeholder="retype your password" />
             
             
            <button type="submit" name="submit" > Submit </button>

            <?php
   
   if(isset($_GET["error"])){
       if($_GET["error"]=="emptyInput"){
           echo "<h3>Empty fields</h3>";
       }
       else if($_GET["error"]=="invalidEmail")
       {
        echo "<h3>Invalid email</h3>";
       }
       else if ($_GET["error"]=="passwordNotMatch")
       {
        echo "<h3>Passwords dont match</h3>";
       }
       else if($_GET["error"]=="nameTaken")
       {
        echo "<h3>Name already taken</h3>";
       }
       else if($_GET["error"]=="statementFailed")
       {
        echo "<h3>Something went wrong</h3>";
       }
    }
       ?>
        </form>
</div>   