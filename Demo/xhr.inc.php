<?php
include_once "includes/ClassLoader.inc.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST)){
    if(isset($_POST['instruct'])){
        //echo $_POST['instruct'];
        serviceManager($_POST['instruct']);
   
    }
}

if(isset($_GET)){
    if(isset($_GET['instruct'])){
        $instruction = $_GET['instruct'];
        serviceManager($instruction);
    }else{
        
    }
}


function serviceManager($service){

    switch ($service) {
        case 'getArticles':
            $ArtService = new ManagerView;
            echo $ArtService->showArticles();
            break;
        
        case 'getArticle':
                if(isset($_GET['info'])){
                    $Service = new ManagerView;
                    echo $Service->fetchArticle($_GET['info']);
                }else{
                    echo 'fail';
                }
             break;
            

        case 'Search':
           if(isset($_GET['info'])){
               $Service = new ManagerView;
               echo $Service->getSearchResults($_GET['info']);
           }else{
               echo 'fail';
           }
        break;
         
        case 'readArticle':
           if(isset($_GET['info'])){
               $Service = new ManagerContr;
               echo $Service->readArticle($_GET['info']);
               eventTracker($_SESSION['uid'], $_GET['info'], $service);
           }else{
               echo 'fail';
           }
        break;      

        case 'likeArticle':
            if(isset($_GET['info'])){
                $Serv1 = new ManagerContr;
                echo $Serv1->likeArticle($_GET['info']);

            }else{
                echo 'fail';
            }
         break;
        
        case 'dislikeArticle':
           if(isset($_GET['info'])){
               $Ser = new ManagerContr;
               echo $Ser->dislikeArticle($_GET['info']);
           }else{
               echo 'fail';
           }
        break; 

        case 'getComments';
            if(isset($_GET['info'])){
                $getCommentServ = new ManagerView;
                echo $getCommentServ->fetchComments($_GET['info']);
            }

        break;

        case 'addComment':
            $addCommentService = new ManagerContr;
            echo $addCommentService->newComment($_SESSION['uid'], $_POST['id'], $_SESSION['username'], $_POST['content']);
            break;

        case 'loginCheck':
                if(isset($_SESSION['uid']) && isset($_SESSION['username']) &&isset($_SESSION['email'])){
                    echo 'Y';
                }else{
                    echo 'N';
                }
        break;

        case 'signup':
                if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pswd'])){
                    echo signUp($_POST['name'],$_POST['email'], $_POST['pswd']);
                }
                
            
            break;

        case 'logIn':
                 if(isset($_POST['eInfo']) && isset($_POST['pInfo'])){
                      $logService = new ManagerView;
                      echo $logService->logIn($_POST['eInfo'], $_POST['pInfo']);
                 }else{
                     echo 'No input recieved';
                 }
        break;

        case 'logout':
            if(isset($_SESSION['uid']) && isset($_SESSION['username']) &&isset($_SESSION['email'])){
                unset($_SESSION['uid']);
                unset($_SESSION['username']);
                unset($_SESSION['email']);
                session_destroy();
            }
        break;

        case 'publish':
            if(loggedInCheck() != false ){
                $pubService = new ManagerContr();
                echo $pubService->newArticle($_SESSION['uid'], $_SESSION['username'], $_POST['title'], $_POST['interest'], $_POST['opinion'], $_POST['content']);
            }else{
                echo 'You must be logged in to publish an article!';
            }
            break;

        
    }

}

//How check if the user is logged in
function loggedInCheck(){
    if(isset($_SESSION['uid']) && isset($_SESSION['username']) &&isset($_SESSION['email'])){
        return true;
    }else{
        return false;
    }
}


function eventTracker($user, $article, $type){
    if(loggedInCheck() == true){
        $eventService = new ManagerContr;
        $eventService->newEvent($user, $article, $type);
    }
}

function signUp($name, $email, $password){
    $signUpService = new ManagerContr;
    $signUpService->newUser($name, $email, $password);
    echo 'success';
}

function closeAccount(){

}

function logIn(){
    if(loggedInCheck()!= true){
        $logService = new ManagerView;
        echo $logService->logIn($_POST['eInfo'], $_POST['pInfo']);
    }else{
        echo 'Already logged in!';
    }
}

function logOut(){
    if(loggedInCheck() != false){
        unset($_SESSION['uid']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        session_destroy();
        echo 'Logged out!';
    }else{
        echo 'Not logged in';
    }
}

function searchArticles(){
    if(isset($_GET['info'])){
        $Service = new ManagerView;
        echo $Service->getSearchResults($_GET['info']);
    }else{
        echo 'fail';
    }
}

function getArticles(){
    $ArtService = new ManagerView;
    echo $ArtService->showArticles();
}


function getArticle(){
    if(isset($_GET['info'])){
        $Service = new ManagerView;
        echo $Service->fetchArticle($_GET['info']);
    }else{
        echo 'fail';
    }
}

function publishArticle(){
    if(loggedInCheck() == true){

    }else{
        echo 'Not logged in';
    }
}

function readArticle(){
    if(loggedInCheck() == true){
        if(isset($_GET['info'])){
            $Service = new ManagerContr;
            echo $Service->readArticle($_GET['info']);
            eventTracker($_SESSION['uid'], $_GET['info'], 'Read');
        }else{
            echo 'fail';
        }
    }    
}

function likeArticle(){
    if(loggedInCheck() == true){
        $Serv1 = new ManagerContr;
        echo $Serv1->likeArticle($_GET['info']);
        eventTracker($_SESSION['uid'], $_GET['info'], 'Like');
    }else{
        echo 'Not logged';
    }
}


function dislikeArticle(){
    if(loggedInCheck() == true){
        $Ser = new ManagerContr;
        echo $Ser->dislikeArticle($_GET['info']);
        eventTracker($_SESSION['uid'], $_GET['info'], 'Dislike');
    }else{
        echo 'Not logged';
    }
}


function loadComments(){
    $getCommentServ = new ManagerView;
    echo $getCommentServ->fetchComments($_GET['info']);
}

function addComment(){
    if(loggedInCheck() == true){
        eventTracker($_SESSION['uid'], $_POST['id'], 'Comment');
        $addCommentService = new ManagerContr;
        echo $addCommentService->newComment($_SESSION['uid'], $_POST['id'], $_SESSION['username'], $_POST['content']);
    }
}



