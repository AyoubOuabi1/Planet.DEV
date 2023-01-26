<?php
class User
{
    public static function login($email,$password) : bool {
        $con=DbConnection::getConnection();
        $qry=$con->prepare("select * from users where email='$email' and password=md5('$password')");
        $qry->execute();
        session_start();
        if($qry->rowCount()>0){
            $_SESSION['adminId']=$qry->fetch()[0];
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
        $qry=$con->prepare("SELECT articles.id,titre,description,date,image, CONCAT(firstName,' ',lastName) as username,CatName as categoryName,categories.id as catId FROM articles inner join users on articles.user_id=users.id inner join categories on articles.cat_id=categories.id order by articles.id desc");
        $qry->execute();
        return $qry->fetchAll();

    }

    public static function getLastFourAllArticles():array{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("SELECT articles.id,titre,description,date,image, CONCAT(firstName,' ',lastName) as username,CatName as categoryName,categories.id as catId FROM articles inner join users on articles.user_id=users.id inner join categories on articles.cat_id=categories.id order by articles.id desc limit 4");
        $qry->execute();
        return $qry->fetchAll();

    }
    public static function getAllArticlesBySearch($inpt):array{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("SELECT articles.id,titre,description,date,image, CONCAT(firstName,' ',lastName) as username,CatName as categoryName,categories.id as catId FROM articles inner join users on articles.user_id=users.id inner join categories on articles.cat_id=categories.id where articles.titre like '%$inpt%' or categories.CatName like '%$inpt%'");
        $qry->execute();
        return $qry->fetchAll();

    }

     public static function updateArticle(Article $article) : bool{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("update articles SET titre='$article->title',description='$article->description',cat_id='$article->cat_id' where id=$article->id");
        $qry->execute();
        if($qry->rowCount()){
            return true;
        }else {
            return false;
        }
    }

    public static function deleteArticle($id):bool{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("delete from articles where id=$id");
        $qry->execute();
        if($qry->rowCount()){
            return true;
        }else {
            return false;
        }
    }


    public static function getCategories():array{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("SELECT  * FROM categories");
        $qry->execute();
        return $qry->fetchAll();

    }
    public static function getTotalCategories():String{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("SELECT count(*) FROM categories");
        $qry->execute();
        return $qry->fetch()[0];

    }
    public static function getImageName($id):string{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("SELECT image from articles where id=$id");
        $qry->execute();
        return $qry->fetch()[0];
    }
    public static function getTotalArticles( ):string{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("SELECT count(*) from articles");
        $qry->execute();
        return $qry->fetch()[0];
    }

    public static function getTotalUsers( ):string{
        $con=DbConnection::getConnection();
        $qry=$con->prepare("SELECT count(*) from users");
        $qry->execute();
        return $qry->fetch()[0];
    }
}