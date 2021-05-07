<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Reviews</title>

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
<style>

body {
    font-weight: bold;
}

</style>

<?php

include('db_connection.php');

$stmt = $db->prepare("SELECT naam, email, functie, datum, rating_cv, rating_website FROM formulier");
$stmt->execute();

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #474747!important; position: static; height: 8.2%; width: 100%;">
  <a class="navbar-brand" href="#">HOME.</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item active">
        <a class="nav-link" href="certificaten.php">CERTIFICATEN. <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="review.php">REVIEWS.</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          TIPS.
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: grey;">
          <a class="dropdown-item" href="frontend.php">.FRONTEND</a>
          <a class="dropdown-item" href="backend.php">.BACKEND</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<br>
<h2> Lijst </h2>
<a href="#cijfer">Gemiddelde cijfer </a>
<div class="container">

<div class="item">
<h2>Reviews</h2>
<table class="table table-sm">
    <tr>
        <th> Naam </th>
        <th> Email </th>
        <th> Functie </th>
        <th> Datum</th>
        <th> Rating van CV</th>
        <th> Rating van Website</th>
    </tr>
    <tr>
<?php

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $naam = $row['naam'];
    $email = $row['email'];
    $functie = $row['functie'];
    $datum = $row['datum'];
    $ratingCv = $row['rating_cv'];
    $ratingWebsite = $row['rating_website'];

    echo "<td>" . $naam . "</td> <td>" . $email . "</td> <td>" . $functie . "</td> <td>" . $datum . "</td> <td>" . $ratingCv . "</td> <td>" . $ratingWebsite . "</td> <tr>";
}

?>

    </tr>
</table>
<?php 

    $totaalReviewRatingWebsite = $db->query("SELECT SUM(rating_website) AS total FROM formulier")->fetchColumn();
    $totaalReviewRatingCV = $db->query("SELECT SUM(rating_cv) AS total FROM formulier")->fetchColumn();

    $aantalRows = $db->query('select count(*) from formulier')->fetchColumn(); 

    echo "<h2 id='cijfer'> Gemiddelde cijfer </h2> <br> website: " . ($totaalReviewRatingWebsite / $aantalRows) . " <br> CV: " . ($totaalReviewRatingCV / $aantalRows);

?>

</div>
</div>
<br>
<br>
<center>
<div class="footer" style="position: fixed; left: 0; bottom: 0; width: 100%; height: 5%; background-color: #279e94; color: white; text-align: center;">
<p>LinkedIn <a href="https://www.linkedin.com/in/alen-tarabar-543a55159/" style="font-size: 2.2rem !important;" class="fab fa-linkedin"></a> Gmail <a href="mailto:alen97tarabar@gmail.com" style="font-size: 2.2rem !important;" class="fas fa-envelope"></a></p>
</div>
</center>
</body>
</html>