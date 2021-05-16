<?php

// define variables and set to empty values
$nameErr = $emailErr = $functieErr = "";
$name = $email = $functie = $comment = "";

$countNoErr = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["naam"])) {
    $nameErr = "Name is required";
    echo "Name is required";
  } else {
    $name = test_input($_POST["naam"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      echo "Alleen letters en spaties toegestaan in Naam <br>";
    }
    $countNoErr++;
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    echo "email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      echo "Email in verkeerde format <br>";
    }
    $countNoErr++;
  }

  if (empty($_POST["functie"])) {
    $functieErr = "Functie is required";
    echo "Functie is required";
  } else {
    $functie = test_input($_POST["functie"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$functie)) {
      $functieErr = "Only letters and white space allowed";
      echo "Alleen letters en spaties toegestaan in Functie <br>";
    }
    $countNoErr++;
  }

  if (empty($_POST["commentaar"])) {
    $comment = "";
    echo "Comment is required";
  } else {
    $comment = test_input($_POST["commentaar"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$comment)) {
        $commentErr = "Only letters and white space allowed";
        echo "Alleen letters en spaties toegestaan in Feedbaack <br>";
    }
    $countNoErr++;
  }

    echo "<a href='index.php'> Terug naar de Home pagina </a><br>";
    echo "Totale Errors: " . $countNoErr;

  if ($countNoErr == 4){
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