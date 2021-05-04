<!DOCTYPE html>

<head>

<title> Wisselgeld </title>

</head>

<body>

<style>

body {
    font-weight: bold;
}

</style>

<h1>
Wisselgeld
</h1>

<form action="wisselgeld.php" method="post">

<label for="numberOne"> Hoeveel geld wil je wisselen? </label>
<input type="number" step="0.01" id="numberOne" name="numberOne">
<br>
<br>
<input type="submit" value="Wissel" name="wissel"/>
<br>
<br>

<?php

$geldEuros = array(
    50 => "50euro.png",
    20 => "20euro.png",
    10 => "10euro.png",
    5 => "5euro.png",
    2 => "2euro.png",
    1 => "1euro.png"
);

$geldCenten = array(
    50 => "50cent.png",
    20 => "20cent.png",
    10 => "10cent.png",
    5 => "5cent.png",
);

if (isset($_POST['numberOne'])) {
    $gegevenBedrag = $_POST['numberOne'];
} else {
    exit;
}

$geld = explode(".", $gegevenBedrag);
$euro = round($geld[0], 2);

//euros omrekenen hier
if (is_numeric($euro)) {
    $bedrag = round(floatval($euro) * 100);
}

$biljet = floor($bedrag);

foreach ($geldEuros as $biljet => $geldImage) {
    $biljet *= 100;

    if ($biljet == 0) {
        exit;
    }

    if ($bedrag >= $biljet) {
        $hoeveel = floor($bedrag / $biljet);

        $bedrag = fmod($bedrag, $biljet);
        
        if ($biljet >= 100) {
            echo $hoeveel . " x " . $biljet / 100 . " euro <br>";
            for ($i = 0; $i < $hoeveel; $i++) {
                echo "<img src=\"$geldImage\" height='80px'>";
            }
            echo "<br>";
        }
    }
}

//centen omrekenen hier
if (isset($geld[1])) {
    $cent = round($geld[1], 2);

    $cent = round($cent / 5) * 5;

    if (is_numeric($cent)) {
        $bedragCent = round(floatval($cent) * 100);
    }

    $munten = floor($bedragCent);

    foreach ($geldCenten as $munten => $CentImage) {
        $munten *= 100;

        if ($munten == 0) {
            exit;
        }

        if ($bedragCent >= $munten) {
            $hoeveel = floor($bedragCent / $munten);

            $bedragCent = fmod($bedragCent, $munten);
            
            if ($munten >= 100) {
                echo $hoeveel . " x " . $munten / 100 . " euro <br>";
                for ($i = 0; $i < $hoeveel; $i++) {
                    echo "<img src=\"$CentImage\" height='80px'>";
                }
                echo "<br>";
            }
        }
    }
} else {
    echo "";
    //geen centen
}

?>

</body>

</html>