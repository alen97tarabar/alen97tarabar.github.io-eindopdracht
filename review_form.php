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
<br>
<br>
<h1> Beoordeling Form </h1> <a href="#"> <i class="fas fa-angle-double-up" style="font-size: 3rem"></i> </a>
<br>
<br>
<form id="formulier" action="review_form_stmt_insert.php" method="post">
<div class="form-row">
<div class="col-md-2 mb-1">
    <label for="naam"> Naam: </label>
    <input id="naam" type="text" class="form-control is-valid" name="naam" required>

    <label for="email"> Email: </label>
    <input id="email" type="email" class="form-control is-valid" name="email" required>

    <label for="functie"> Functie: </label>
    <input id="functie" type="text" class="form-control is-valid" name="functie" required>

    <label for="datum"> Datum: </label>
    <input id="datum" type="date" class="form-control is-valid" name="datum" value="yyyy-mm-dd" required>
      <br>
      <input type="submit" class="btn btn-primary" name="submit" value="Klaar">
</div>
<div class="col-md-4 mb-5">
    <label for="commentaar"> Commentaar/Feedback: </label>
    <textarea id="commentaar" type="text" class="form-control is-valid" name="commentaar" pattern="[A-Za-z0-9_]{1,15}" rows="8" cols="50"></textarea>
</div>
<div class="col-md-1 mb-6">
    <label for="rating_cv"> Beoordeling CV (1-10): </label>
    <input type="number" class="form-control is-valid" name="rating_cv" required>
</div>
<div class="col-md-1 mb-7">
    <label for="rating_website"> beoordeling Website: </label>
<div class="stars">
    <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
    <label class="star star-1" for="star-1"></label>
</div>
    </div>
</div>
</form>
<br>
<br>
</body>
</html>