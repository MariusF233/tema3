<?php


function calculator(int $operand1,string $operation,int $operand2)
{

switch($operation)
{
    case '+':
    echo $operand1+$operand2;
    break;

    case '-':
    echo $operand1-$operand2;
    break;

    case '*':
    echo $operand1*$operand2;
    break;

    case '/':
    echo $operand1/$operand2;
    break;

    default:
    echo 'invalid operator!';
}


}

?>