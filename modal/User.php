<?php
class User
{
    public static function login($email,$password){
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
}