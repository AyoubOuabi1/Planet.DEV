<?php
require "./Controller/checkSession.php";
spl_autoload_register(function($className) {
    $file = './modal/'.$className.'.php';
    require $file;
}); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" integrity="sha512-5PV92qsds/16vyYIJo3T/As4m2d8b6oWYfoqV+vtizRB6KhF1F9kYzWzQmsO6T3z3QG2Xdhrx7FQ+5R1LiQdUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="secondary-bg" id="sidebar-wrapper">
        <?php include './View/navBar.html' ?>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="bi bi-list primary-text-color fs-2 me-3" id="menu-toggle"></i>
                <h2 id="pageTitle" class="fs-2 m-0 primary-text-color">Dashboard</h2>
            </div>
        </nav>

        <div class="container-fluid px-4" id="container">
            <div class="row g-3 my-2">
                <div class="col-md-4">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo User::getTotalArticles()?></h3>
                            <p class="fs-5">Total Articles</p>
                        </div>
                        <i class="fas fa-newspaper fs-1 primary-text-color border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2 " ><?php echo User::getTotalCategories()?></h3>
                            <p class="fs-5 ">Total Categories</p>
                        </div>
                        <i
                            class="fas bi bi-collection fs-1  border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo User::getTotalUsers()?></h3>
                            <p class="fs-5">Total Users</p>
                        </div>
                        <i class="fas fa-user fs-1 primary-text-color border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
            </div>
            <div class="row my-5">

                <div class="col-12 table-responsive">
                    <h3 class="fs-4 mb-3 primary-text-color">Last 4 articels</h3>

                    <table class="table  bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr>
                            <th scope="col">image</th>
                            <th scope="col">title</th>
                            <th scope="col">added in</th>
                            <th scope="col">added by</th>
                            <th scope="col">Category</th>
                        </tr>
                        </thead>
                        <tbody id="dashboarTabledBody">
                        <?php  foreach(User::getLastFourAllArticles() as $article){
                            $image="./assets/images/".$article["image"];
                            $titre=$article["titre"];
                            $username=$article["username"];
                            $date=$article["date"];
                            $categoryName=$article["categoryName"];
                            $height="height="."25px";
                            $width="width="."45px";
                            $alt="alt"."article img";
                            echo "
                              <tr>
                                <td><img src=$image  $alt $height $width /></td>
                                <td> $titre</td>
                                <td>$date</td>
                                <td> $username</td>
                                <td>$categoryName</td>
                            </tr>                                                   
                            ";

                        } ?>





                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./assets/js/main.js"></script>

</body>
</html>