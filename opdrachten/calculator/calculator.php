<!DOCTYPE html>

<head>

<title> Calculator </title>

</head>

<body>

<style>

body {
    font-weight: bold;
}

</style>

<h1>
Calculator
</h1>

<form action="calculator.php" method="post">

<input type="number" id="numberOne" name="numberOne">
<label for="numberOne"> : Eerste nummer </label>
<br>
<br>
<input type="number" id="numberTwo" name="numberTwo">
<label for="numberTwo"> : Tweede nummer </label>
<br>
<br>

<?php

$numberOne = $_POST['numberOne'];
$numberTwo = $_POST['numberTwo'];

switch ($_POST['operator']) {
    case "Add":
        echo "Add: ";
        echo $numberOne + $numberTwo;
        break;
    case "Substract":
        echo "Substract: ";
        echo $numberOne - $numberTwo;
        break;
    case "Multiply":
        echo "Multiply: ";
        echo $numberOne * $numberTwo;
        break;
    case "Divide":
        echo "Divide: ";
        echo $numberOne / $numberTwo;
        break;
    case "Modulo":
        echo "Modulo: ";
        echo $numberOne % $numberTwo;
        break;
    default:
        echo "Pick an operator";
}

?>

<br>
<br>
<input type="submit" value="Add" name="operator"/>
<input type="submit" value="Substract" name="operator"/>
<input type="submit" value="Multiply" name="operator"/>
<input type="submit" value="Divide" name="operator"/>
<input type="submit" value="Modulo" name="operator"/>

</form>

</body>

</html>