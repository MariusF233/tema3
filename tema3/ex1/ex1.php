<?php

require_once 'function1.php';

?>

<form method='post' >

<label>First operand:</label>
<input type='number' name='operand1'>

<label>Operation:</label>
<input type="text" name="operation">

<label>Second operand:</label>
<input type='number' name='operand2'>

<button type='submit' name='submit'>Submit</button>

<label>Your result:</label>

<?php

//$operand1=$_POST['operand1'];
//$operand2=$_POST['operand2'];
//$operation=$_POST['operation'];
if(isset($_POST["submit"])){

    calculator($_POST['operand1'],$_POST['operation'],$_POST['operand2']);
}


?>



</form>