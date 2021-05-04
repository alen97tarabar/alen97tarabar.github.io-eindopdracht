<?php

if (isset($_POST['submit'])){
    try {
        include('db_connection.php');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $naamInsert = $_POST['naam'];
        $emailInsert = $_POST['email'];
        $functieInsert = $_POST['functie'];
        $datumInsert = $_POST['datum'];
        $ratingCvInsert = $_POST['rating_cv'];
        $ratingWebsiteInsert = $_POST['rating_website'];

        $stmtInsert = $db->prepare("INSERT INTO formulier
        (naam, email, functie, datum, rating_cv, rating_website)
        VALUES (:naam, :email, :functie, :datum, :rating_cv, :rating_website);"); 

        $stmtInsert->bindParam(':naam', $naamInsert, PDO::PARAM_STR);
        $stmtInsert->bindParam(':email', $emailInsert, PDO::PARAM_STR);
        $stmtInsert->bindParam(':functie', $functieInsert, PDO::PARAM_STR);
        $stmtInsert->bindParam(':datum', $datumInsert, PDO::PARAM_STR);
        $stmtInsert->bindParam(':rating_cv', $ratingCvInsert, PDO::PARAM_STR);
        $stmtInsert->bindParam(':rating_website', $ratingWebsiteInsert, PDO::PARAM_STR);

        $stmtInsert->execute();
        echo "Bedankt voor de review! <br> <a href='index.php'> Homepage </a>";

    } catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
}
?>