<!DOCTYPE html>
<html lang="en">
<?php include 'head.html'?>
<body>
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
                        <h5 >&emsp;Add Articles&emsp;</h5>
                    </button>

                </div>
                 <div class="row my-5">

                     <div class="col-12 table-responsive">
                         <h3 class="fs-4 mb-3 primary-text-color">La list des articels</h3>

                         <table class="table  bg-white rounded shadow-sm  table-hover">
                             <thead>
                             <tr>
                                 <th scope="col">image</th>
                                 <th scope="col">title</th>
                                 <th scope="col">added in</th>
                                 <th scope="col">added by</th>
                                 <th scope="col"></th>
                             </tr>
                             </thead>
                             <tbody id="dashboarTabledBody">


                             </tbody>
                         </table>
                     </div>
                 </div>

            </div>
        </div>
    </div>
</div>
<?php include 'ArticlesModal.html' ?>

<?php include 'biblios.html' ?>


</body>
</html>