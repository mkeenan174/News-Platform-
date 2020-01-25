<?php

class ManagerView extends Manager{

    public function test(){
        $result = $this->testGET();
        echo $result;
    }

    public function showUser($name){
        $result = $this->getUser($name);
        //echo var_dump($result);
        echo $result;

    }

    public function showArticles(){
        $articles = $this->getAllArticles();
        return $articles;
    }

    public function fetchArticle($id){
        $article = $this->getArticle($id);
        return $article;
    }

    public function getSearchResults($input){
        $articles = $this->searchArticles($input);
        return $articles;
    }

    public function userExists($user){
        if($this->getUser($user) != null){
            return true;
        }else{
            return false;
        }
    }

    public function logIn($user, $password){
        if($this->userExists($user) != false){
            if($password == $this->getPass($user)){
                echo 'correct';
            }else{
                echo 'incorrect';
            }
        }else{
            echo 'user doesnt exist';
        }
    }
}