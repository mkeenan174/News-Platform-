<?php 

class Manager extends Dbh{
    // Test functions

    function testGET(){
        $text = 'test';
        return $text;
    }
    
    
    // User functions 
    function getUser($name){
        $sql = 'SELECT * FROM users WHERE user_name = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        if($stmt->rowCount()){
            while($row = $stmt->fetch()){
                return $row['user_name'];
            }
        }
    }

    function getPass($name){
        $sql = 'SELECT * FROM users WHERE user_name = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        if($stmt->rowCount()){
            while($row = $stmt->fetch()){
                return $row['user_password'];
            }
        }
    }
   


    function getAllUsers(){
        $sql = 'SELECT * FROM users';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchALL();

        return $result;
    } 

    function insertUser($name, $email, $interest, $alignment, $password){
        $sql = 'INSERT INTO users( user_name, user_email, user_Interests, User_alignment, user_password) VALUES ( ?, ?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $email, $interest, $alignment, $password]);
        
    }


    // Article functions 
    function getAllArticles(){
        $sql = 'SELECT * FROM articles';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        return $result;
    }

    function getArticle($id){
        $sql = 'SELECT * FROM articles WHERE article_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = json_encode($stmt->fetchAll());
        return $result;
    }


    function insertArticle($userId, $author, $title, $interest, $opinion, $content){
        $sql = 'INSERT INTO articles(users_id, author_name, article_title, article_interest, article_opinion, article_content) VALUES ( ?, ?, ?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userID, $author, $title, $interest, $opinion, $content]);

    }

    function addRead($id){
        $sql = 'UPDATE articles SET article_reads = article_reads + 1 WHERE  article_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return 'Success!';
    }


    function likeArticle($id){
        $sql = 'UPDATE articles SET article_likes = article_likes + 1 WHERE article_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        

    }


    function dislikeArticle($id){
        $sql = 'UPDATE articles SET article_dislikes = article_dislikes + 1 WHERE article_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return 'Article Disliked';
    }



    // Comment functions 

    protected function insertComment($authorId, $articleId, $author, $content ){
        $sql = 'INSERT INTO comments ( user_id, article_id, comment_author, comment_content) VALUES (?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$authorId, $article, $author, $content]);
    }


    protected function getComment($id){
        $sql = 'SELECT * FROM comments WHERE comment_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetchAll();
        return $result;
    }

    protected function commentsByArticle($id){
        $sql = 'SELECT * FROM comments WHERE article_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetchAll();
        return $result;
    }

    //Search query 
    protected function searchArticles($input){
        $sql = 'SELECT * FROM articles  WHERE article_title LIKE ? OR author_name LIKE ? OR article_content LIKE ?';
        $params = array("%$input%", "%$input%", "%$input%");
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($params);
        $result = json_encode($stmt->fetchAll());
        return $result;
    }


}