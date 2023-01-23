<?php
spl_autoload_register(function($className) {
    $file = '../modal/'.$className.'.php';
    require $file;
});
session_start();
insertIntoArticle();
function insertIntoArticle(): void
{
    $title=$_POST['title'];
    $description=$_POST['description'];
   // $userId=$_SESSION['user']['id'];
   // $cat_id=$_POST['cat_id'];

    if (loadImage()!=null){
        if(User::insertArticle(new Article(null,$title,$description,null,loadImage(),1,1))){
            echo 'true';
        }else{
            echo 'false';
        }
    }else{
        echo 'false error';
    }

}

function updateArticle(): void
{
    $id=$_POST['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $image=$_POST['image'];
    $cat_id=$_POST['cat_id'];
    if(User::updateArticle(new Article($id,$title,$description,null,$image,null,$cat_id))){
        echo 'true';
    }else{
        echo 'false';
    }
}

function deleteArticle(): void
{
    $id=$_POST['id'];
    if(User::deleteArticle($id)){
        echo 'true';
    }else{
        echo 'false';
    }
}
function loadArticles($id): void{
    if($id==1){
        getAllArticles(User::getAllArticles());
    }else{
        $title=$_POST['title'];
        $category=$_POST['category'];
        getAllArticles(User::getAllArticlesBySearch($title,$category));
    }
}
function getAllArticles($funct): void
{
    $arr=array();
    foreach($funct as $article){
        $arr=[
            "id"=>$article["id"],
            "title"=>$article["title"],
            "description"=>$article["description"],
            "date"=>$article["date"],
            "image"=>$article["image"],
            "username"=>$article["username"],
            "categoryName"=>$article["categoryName"]
        ];
    }
    echo json_encode($arr);
}

function loadImage(): ?string{
    if($_FILES["file"]["name"] != '')
    {
        $test = explode('.', $_FILES["file"]["name"]);
        $ext = end($test);
        $name = rand(100, 999) . '.' . $ext;
        $location = '../assets/images/' . $name;
        move_uploaded_file($_FILES["file"]["tmp_name"], $location);
        return $name;

    }
    return null;
}
