<?php
include_once 'includes/ClassLoader.inc.php';
include_once 'includes/Switch.inc.php';


// $object = new Article;
// echo $object->getArticles();

// $object = new ManagerView;
// $object->showUser('Mark');

 $object2 = new ManagerContr;
     echo $object2->likeArticle('1');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="main.js"></script>
    <script src="test.js" type="module"></script>
    <title>Document</title>
</head>
<header>
<a href="searchpage.php">Search </a>


<form id="loginform">
<input type="email"  id="userlog">
<input type="password"  id="userpass">
<button type="submit">Login</button>
</form>




</header>
<body id="doc-body">
   <div id="test-pen"></div>
</body>
</html>