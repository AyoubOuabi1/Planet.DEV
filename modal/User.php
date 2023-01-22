<?php
class User
{
    public static function login($email,$password) : bool {
        $con=DbConnection::getConnection();
        $qry=$con->prepare("select * from users where email='$email' and password=md5('$password')");
        $qry->execute();
        session_start();
        if($qry->rowCount()>0){
            $_SESSION['user']=$qry->fetch();
            return true;
        }else{
            return false;
        }

    }

    public static function insertArticle(Article $article) : bool{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("insert into  articles values(null, '$article->title','$article->description',SYSDATE(),'$article->image','$article->userId','$article->cat_id')");
        $qry->execute();
        if($qry->rowCount()){
            return true;
        }else {
            return false;
        }
    }

    public function getAllArticles():array{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("SELECT * FROM articles");
        $qry->execute();
        return $qry->fetchAll();

    }
    public static function updateArticle(Article $article) : bool{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("update articles SET title='$article->title',description='$article->description',image='$article->image',cat_id='$article->cat_id' where id=$article->id");
        $qry->execute();
        if($qry->rowCount()){
            return true;
        }else {
            return false;
        }
    }

    public static function deleteArticle($id):bool{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("delete from articles where id=id");
        $qry->execute();
        if($qry->rowCount()){
            return true;
        }else {
            return false;
        }
    }






}