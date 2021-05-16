<!DOCTYPE html>
<html lang="en">
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> Front-End </title>


<meta name="theme-color" content="#45e0ff">

<meta name="msapplication-navbutton-color" content="#45e0ff">

<meta name="apple-mobile-web-app-status-bar-style" content="#45e0ff">

<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://kit.fontawesome.com/060b795035.js" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<style>

html {
    scroll-behavior: smooth;
    overflow: hidden;
}

.navbar {
    display: flex;
    width: 98%;
    justify-content: space-around;
    margin: 1em;
}

.navButton {
    border: none;
    font-family: arial, sans-serif;
    box-shadow: 0px 2px 2px 0px;
    font-size: 25px;
    text-decoration: none;
    color: black;
    background-color: white;
}

.navButton:hover {
    cursor: pointer;
    box-shadow: 0px 2px 4px 2px;
}

.navMenu {
    border: none;
    font-family: arial, sans-serif;
    box-shadow: 0px 2px 2px 0px;
    font-size: 20px;
    text-decoration: none;
    background-color: #279e94;
}

.navMenu:hover {
    cursor: pointer;
    box-shadow: 0px 2px 4px 2px;
}

.container {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

.menu {
    position: fixed;
    top: 10%;
    height: 600px;
    box-shadow: 0px 0px 2px 1px;
    text-align: center;
    padding: 10px 1px 1px 1px;
}

.containerSkill {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.itemSkill {
    position: relative;
    margin: 80px;
    height: 670px;
    width: 60%;
    left: 10%;
    box-shadow: 0px 0px 2px 1px;
    text-align: center;
    background-color: white;
    display: flex;
    flex-direction: column;
}

.orange {
    background-color: darkorange;
    width: 30%;
    margin: 10px;
    font-size: larger;
    align-self: center;
}

.itemContact {
    position: relative;
    top: 90px;
    height: 400px;
    width: 50%;
    box-shadow: 0px 0px 2px 1px;
    text-align: center;
    background-color: white;
    display: flex;
    flex-direction: column;
}

.item {
    position: relative;
    top: 90px;
    height: 400px;
    width: 25%;
    box-shadow: 0px 0px 2px 1px;
    text-align: center;
    background-color: white;
}

footer {
    position: fixed;
    bottom: 0px;
    width: 99%;
    text-align: center;
    box-shadow: 0px -1px 1px 1px;
    margin: 0px 0px 10px 0px;
    background-color: white;
}

.tableRow {
    background-color: darkorange;
}

.btn-info {
  width: 100%;
}

</style>

</head>
<body style="background-color: black">
<div class="bg"> 

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #474747!important; position: static; margin: 0px; height: 8.2%; width: 100%;">
  <a class="navbar-brand" href="index.php">HOME.</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item active">
        <a class="nav-link" href="certificaten.html">CERTIFICATEN. <span class="sr-only">(current)</span></a>
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

<script>
$(document).ready(function(){
  $(".navbar-toggler").click(function(){
    $("#container").toggle(1000);
  });
});
</script>

<div class="containerSkill">

      <div id="1" class="itemSkill">
      <h2> HTML tips hier</h2>
      </div>
    
      <div id="2" class="itemSkill">
      <h2> CSS tips hier</h2>
      </div>
    
      <div id="3" class="itemSkill">
      <h2> Bootstrap tips hier</h2>
      </div>
    
    </div>

    <div class="menu">
      <a class="btn btn-info" href="#navbarSupportedContent" ><i class="fas fa-angle-double-up" style="font-size: 3rem"></i></a>
      <br>
      <br>
      <a class="btn btn-info" href="#1" >HTML</a>
      <br>
      <br>
      <a class="btn btn-info" href="#2">CSS</a>
      <br>
      <br>
      <a class="btn btn-info" href="#3">BOOTSTRAP</a>
    </div>

<br>
<center>
<div class="footer" style="position: fixed; left: 0; bottom: 0; width: 100%; height: 5%; background-color: #279e94; color: white; text-align: center;">
<p>LinkedIn <a href="https://www.linkedin.com/in/alen-tarabar-543a55159/" style="font-size: 2.2rem !important;" class="fab fa-linkedin"></a> Gmail <a href="mailto:alen97tarabar@gmail.com" style="font-size: 2.2rem !important;" class="fas fa-envelope"></a></p>
</div>
</center>
</div>
</body>
</html>