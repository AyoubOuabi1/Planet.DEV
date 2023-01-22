<?php

session_start();

function insertIntoArticle(){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $image=$_POST['image'];
    $userId=$_SESSION['user']['id'];
    $cat_id=$_POST['cat_id'];

    $article = new Article(null,$title,$description,null,$image,$userId,$cat_id);
    if(User::insertArticle($article)){
        echo 'true';
    }else{
        echo 'false';
    }
}

function updateArticle(){
    $id=$_POST['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $image=$_POST['image'];
    $cat_id=$_POST['cat_id'];
    $article = new Article($id,$title,$description,null,$image,null,$cat_id);
    if(User::updateArticle($article)){
        echo 'true';
    }else{
        echo 'false';
    }
}

function deleteArticle(){
    $id=$_POST['id'];
    if(User::deleteArticle($id)){
        echo 'true';
    }else{
        echo 'false';
    }
}

/*function getData(){
    $arr=array();
    foreach(User::getAllArticles() as $article){
        $arr=[

        ]
    }
}*/