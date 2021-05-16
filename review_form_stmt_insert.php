<?php

// FORM VALIDATION
$name = $email = $functie = $comment = "";

$countErr = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["naam"])) {
    echo "Naam is verplicht";
    $countErr++;
  } else {
    $name = test_input($_POST["naam"]);
    // VALIDATION
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      echo $name . " : Alleen letters en spaties toegestaan <br>";
      $countErr++;
    }
  }

  if (empty($_POST["email"])) {
    echo "Email is verplicht";
    $countErr++;
  } else {
    $email = test_input($_POST["email"]);
    // EMAIL VALIDATION
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo $email . " : in verkeerde format <br>";
      $countErr++;
    }
  }

  if (empty($_POST["functie"])) {
    echo "Functie is verplicht";
    $countErr++;
  } else {
    $functie = test_input($_POST["functie"]);
    // VALIDATION
    if (!preg_match("/^[a-zA-Z-' ]*$/",$functie)) {
      $functieErr = "Only letters and white space allowed";
      echo $functie . " : Alleen letters en spaties toegestaan <br>";
      $countErr++;
    }
  }

  if (empty($_POST["commentaar"])) {
    $comment = "";
    echo "Feedback is verplicht";
    $countErr++;
  } else {
    $comment = test_input($_POST["commentaar"]);
    // VALIDATION
    if (!preg_match("/^[a-zA-Z-' ]*$/",$comment)) {
        echo $comment . " : Alleen letters en spaties toegestaan <br>";
        $countErr++;
    }
  }

    echo "<a href='index.php'> Terug </a><br><br><br>";
    if ($countErr > 0) {
        echo "Totale Errors: " . $countErr;
    }

  if ($countErr == 0){
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
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>