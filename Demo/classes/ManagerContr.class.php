<?php 

class ManagerContr extends Manager {

    //User functionality
    public function newUser($name, $email, $interests, $alignment, $password){
        $this->insertUser($name, $email, $interests, $alignment, $password );
        echo "New users added!";
    }



    //Article functionality 
    public function newArticle($userId, $author, $title, $interest, $opinion, $content){
        $this->insertArticle($userId, $author, $title, $interest, $opinion, $content);
        echo 'New article added!';
    }

    public function readArticle($id){
        echo $this->addRead($id);
    }


    public function like($id){
       echo $this->likeArticle($id);
        
    }

    public function dislike($id){
        echo $this->dislikeArticle($id);
      

    }

    //Comment functionality
    public function newComment($authorId, $articleId, $author, $content){
        $this->insertComment($authorId, $articleId, $author, $content);
        echo 'Commented added!';
    }

}