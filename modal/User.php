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

    public static function getAllArticles():array{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("SELECT articles.id,titre,description,date,image, CONCAT(firstName,' ',lastName) as username,CatName as categoryName FROM articles inner join users on articles.user_id=users.id inner join categories on articles.cat_id=categories.id");
        $qry->execute();
        return $qry->fetchAll();

    }

    public static function getAllArticlesBySearch($title,$category):array{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("SELECT articles.id,titre,description,date,image, CONCAT(firstName,' ',lastName) as username,CatName as categoryName FROM articles inner join users on articles.user_id=users.id inner join categories on articles.cat_id=categories.id where articles.title like '%$title%' ou categoryName like '%$category%'");
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