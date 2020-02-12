<?php
include_once 'includes/ClassLoader.inc.php';
include_once 'recommend/similarity.rec.php';

$a = [0,3,4,5];
$b = [7,3,3,-1];
echo calcEuclid($a, $b);
var_dump(calcJaccard($a, $b));
echo calcCosine([3,2,0,5,0,0,0,2,0,0], [1,0,0,0,0,0,0,1,0,2]);

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @import url('./css/style.css');
    </style>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   

    <script src="main.js"></script>
    <script src="test.js" type="module"></script>
    <title>Document</title>
</head>
<header>
 
 <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand mx-auto" href="#">Telescopium</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a href="searchpage.php">Search </a>
            </li>
            <li class="nav-item ">
                <a href="login.html">Login </a>
            </li>
            <li class="nav-item ">
                <a href="publish.html">Publish</a>
            </li>
            <li class="nav-item ">
                <a href="#">Profile</a>
            </li>

        </ul>
    </div>


    
 </nav>

<a href="searchpage.php">Search </a>


<form id="loginform">
<input type="email"  id="userlog">
<input type="password"  id="userpass">
<button type="submit">Login</button>
</form>




</header>
<body id="doc-body">
<div class="card" style="width: 16rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>



   <div id="test-pen"></div>

   <div class="grid-holder">
       <div class="container carousel">Caroussel
       <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                
                <!-- The slideshow -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="la.jpg" alt="Los Angeles">
                  </div>
                  <div class="carousel-item">
                    <img src="chicago.jpg" alt="Chicago">
                  </div>
                  <div class="carousel-item">
                    <img src="ny.jpg" alt="New York">
                  </div>
                </div>
                
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
            </div>
       </div>
       <div class="container recommended-cards">Recommended</div>
       <div class="container alternate-cards">Alternate</div>
   </div>
</body>
</html>