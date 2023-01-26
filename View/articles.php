<?php
require "../Controller/checkSession.php";

spl_autoload_register(function($className) {
    $file = '../modal/'.$className.'.php';
    require $file;
}); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" integrity="sha512-5PV92qsds/16vyYIJo3T/As4m2d8b6oWYfoqV+vtizRB6KhF1F9kYzWzQmsO6T3z3QG2Xdhrx7FQ+5R1LiQdUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../assets/style/style.css">
</head><body>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="secondary-bg" id="sidebar-wrapper">
        <?php include 'navBar.html' ?>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="bi bi-list primary-text-color fs-2 me-3" id="menu-toggle"></i>
                <h2 id="pageTitle" class="fs-2 m-0 primary-text-color">Articles</h2>
            </div>
        </nav>

        <div class="container-fluid px-4" id="container">
             <div class="  my-5">
                <div class="mb-3 d-flex justify-content-end">

                    <button class="btn  btn-primary rounded-pill" type="button" data-bs-toggle="modal" onclick="openModl()">
                        <h5>&emsp;Add Articles&emsp;</h5>
                    </button>

                </div>
                 <div class="row my-5">
                     <div class="row">
                         <div class="col-sm-12 col-md-4">
                             <h3 class="fs-4 mb-3 primary-text-color">La list des articels</h3>

                         </div>
                         <div class="col-sm-12 col-md-8">
                             <input type="text" class="form-control" id="searchInput" onkeyup="getArticleBySearch()"  placeholder="Search by title or category">


                         </div>
                     </div>
                     <div class="col-12 mt-3 table-responsive">


                         <table class="table  bg-white rounded shadow-sm  table-hover">
                             <thead>
                             <tr>
                                 <th scope="col">image</th>
                                 <th scope="col">title</th>
                                 <th scope="col">added in</th>
                                 <th scope="col">added by</th>
                                 <th scope="col">Category</th>
                                 <th scope="col"></th>
                             </tr>
                             </thead>
                             <tbody id="loadArticles">


                             </tbody>
                         </table>
                     </div>
                 </div>

            </div>
        </div>
    </div>
</div>
<?php include 'ArticlesModal.php' ?>
<?php include 'DataModal.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/main.js"></script>

</body>
</html>