<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Review Form</title>
</head>
<body>
<style>

body {
    font-weight: bold;
    color: white;
}
form { 
    display: table;      
}
.tableForm { 
    display: table-row; 
}
label { 
    display: table-cell; 
}
input { 
    display: table-cell; 
}
#omschrijving {
    vertical-align: middle;
}

@media all and (max-width: 300px) {
    display: flex;
    flex-direction: column;
    align-items: center;
    color: white;
}

</style>

<?php

include('db_connection.php');

$stmt = $db->prepare("SELECT * FROM cv_website");
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$formNaam = $row['naam'];
$formEmail = $row['email'];
$formFunctie = $row['functie'];
$formDatum = $row['datum'];
$formComment = $row['commentaar'];
$formRatingCv = $row['rating_cv'];
$formRatingWebsite = $row['rating_website'];

?>
<a href="index.php">Terug </a>
<br>
<br>
<h1> Beoordeling Form </h1>
<br>
<br>
<form id="formulier" action="review_form_stmt_insert.php" method="post">
<p class="tableForm">
    <label for="naam"> Naam: </label>
    <input id="naam" type="text" name="naam">
</p>
<p class="tableForm">
    <label for="email"> Email: </label>
    <input id="email" type="text" name="email">
</p>
<p class="tableForm">
    <label for="functie"> Functie: </label>
    <input id="functie" type="text" name="functie">
</p>
<p class="tableForm">
    <label for="datum"> Datum: </label>
    <input id="datum" type="text" name="datum" value="yyyy/mm/dd">
</p>
<p class="tableForm">
    <label for="commentaar"> Commentaar/Feedback: </label>
    <textarea id="commentaar" type="text" name="commentaar" rows="8" cols="50"></textarea>

    <label for="rating_cv"> Beoordeling CV: </label>
    <input type="text" name="rating_cv">

    <label for="rating_website"> beoordeling Website: </label>
    <input type="text" name="rating_website">
</p>
    <input type="submit" name="submit" value="OK">
    <a href="#"> <i class="fas fa-angle-double-up" style="font-size: 3rem"></i> </a>
</form>
</body>
</html>