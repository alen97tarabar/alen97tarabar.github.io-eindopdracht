<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Review Form</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body onload="ratingDisabled()">
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

div.stars {
  width: 320px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { 
    color: #F62; 
}

label.star:hover { 
    transform: rotate(-15deg) scale(1.3); 
}

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
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
<br>
<form id="formulier" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div class="form-row">
<div class="col-md-2 mb-1">
    <label for="naam"> Naam: </label>
    <input id="naam" type="text" class="form-control is-valid" name="naam" required>
    <span class="error">* <?php echo $nameErr;?></span>

    <label for="email"> Email: </label>
    <input id="email" type="email" class="form-control is-valid" name="email" required>
    <span class="error">* <?php echo $emailErr;?></span>

    <label for="functie"> Functie: </label>
    <input id="functie" type="text" class="form-control is-valid" name="functie" required>
    <span class="error">* <?php echo $functieErr;?></span>

    <label for="datum"> Datum: </label>
    <input id="datum" type="date" class="form-control is-valid" name="datum" value="yyyy-mm-dd" required>
      <br>
</div>
<div class="col-md-4 mb-5">
    <label for="commentaar"> Commentaar/Feedback: </label>
    <textarea id="commentaar" type="text" class="form-control is-valid" name="commentaar" pattern="[A-Za-z0-9_]{1,15}" rows="8" cols="50"></textarea>
    <span class="error">* <?php echo $commentErr;?></span>
</div>
<div class="col-md-1 mb-6">
    <label for="rating_cv"> Beoordeling CV (1-10): </label>
    <input type="number" class="form-control is-valid" min="1" max="10" name="rating_cv" required>
</div>
<div class="col-md-1 mb-7">
    <label for="rating_website"> Beoordeling Website: </label>
<div class="stars">
    <input class="star star-5" id="star-5" type="radio" name="star" required value="5"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star" required value="4"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star" required value="3"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star" required value="2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star" required value="1"/>
    <label class="star star-1" for="star-1"></label>
</div>
<br>
<center>
<input type="submit" class="btn btn-primary" id="buttonSubmit" name="submit" value="Klaar">
<?php
// define variables and set to empty values
$nameErr = $emailErr = $functieErr = $commentErr = "";
$name = $email = $functie = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is Verplicht";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["functie"])) {
    $functieErr = "Functie is Verplicht";
  } else {
    $functie = test_input($_POST["functie"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$functie)) {
      $functieErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["commentaar"])) {
    $commentErr = "Commentaar is Verplicht";
  } else {
    $comment = test_input($_POST["commentaar"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$comment)) {
      $commentErr = "Only letters and white space allowed";
    }
  }
}

//HERE IS THE DB INSERT QUERY
if (isset($_POST['submit'])){
    try {
        include('db_connection.php');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $naamInsert = $_POST['naam'];
        $emailInsert = $_POST['email'];
        $functieInsert = $_POST['functie'];
        $datumInsert = $_POST['datum'];
        $commentaarInsert = $_POST['commentaar'];
        $ratingCvInsert = $_POST['rating_cv'];
        $ratingWebsiteInsert = $_POST['star'];

        $stmtInsert = $db->prepare("INSERT INTO formulier
        (naam, email, functie, datum, commentaar, rating_cv, rating_website)
        VALUES (:naam, :email, :functie, :datum, :commentaar, :rating_cv, :rating_website);"); 

        $stmtInsert->bindParam(':naam', $naamInsert, PDO::PARAM_STR);
        $stmtInsert->bindParam(':email', $emailInsert, PDO::PARAM_STR);
        $stmtInsert->bindParam(':functie', $functieInsert, PDO::PARAM_STR);
        $stmtInsert->bindParam(':datum', $datumInsert, PDO::PARAM_STR);
        $stmtInsert->bindParam(':commentaar', $commentaarInsert, PDO::PARAM_STR);
        $stmtInsert->bindParam(':rating_cv', $ratingCvInsert, PDO::PARAM_STR);
        $stmtInsert->bindParam(':rating_website', $ratingWebsiteInsert, PDO::PARAM_STR);

        $stmtInsert->execute();
        echo "<h1> Bedankt voor de review! </h1> <br> <a href='index.php'> HOME </a>";

    } catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }

    $db->close();
}
?>
</center>
    </div>
</div>
<script type="text/javascript">
$(function(){
    var requiredCheckboxes = $('.star :checkbox[required]');
    requiredCheckboxes.change(function(){
        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});
</script>
</form>
<br>
<br>
<br>
</body>
</html>