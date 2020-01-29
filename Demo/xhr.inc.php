<?php

include_once "includes/ClassLoader.inc.php";

if(isset($_POST)){
    if(isset($_POST['instruct'])){
        echo $_POST['instruct'];
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

        case 'logIn':
                 if(isset($_POST['eInfo']) && isset($_POST['pInfo'])){
                      $logService = new ManagerView;
                      echo $logService->logIn($_POST['eInfo'], $_POST['pInfo']);
                    
                 }else{
                     echo 'No input recieved';
                 }
        break;

        
    }

}

