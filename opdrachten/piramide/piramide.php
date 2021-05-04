<!DOCTYPE html>

<head>

<title> Piramide </title>

</head>

<body>

<h1>
the Return of the Pyramids
</h1>

<style>
th {
    width: 10px;
    height: 10px;
}

td {
    width: 10px;
    height: 10px;
}
</style>

<form action="piramide.php" method="post">
<label for="getal"> Hoe groot moet de piramide worden?: </label>
<input type="number" id="getal" name="getal">
<button> Maak </button>
</form>

<table>

<?php

$getal = isset($_POST['getal']) ? $_POST['getal'] : "5";

for ($i = 1; $i <= $getal; $i++) {  
    echo "<tr>";
    echo "<th> $i </th>";
    for ($j = 1; $j <= $i; $j++) {
        echo "<td style='background-color: orange; border-style: groove; width: 10px'>  </td>";
    }

    echo PHP_EOL;
}

?>
</table>

</body>

</html>