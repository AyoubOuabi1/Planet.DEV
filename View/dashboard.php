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
                <h2 id="pageTitle" class="fs-2 m-0 primary-text-color">Dashboard</h2>
            </div>
        </nav>

        <div class="container-fluid px-4" id="container">
            <div class="row g-3 my-2">
                <div class="col-md-4">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">15</h3>
                            <p class="fs-5">Total Books</p>
                        </div>
                        <i class="fas fa-book fs-1 primary-text-color border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2 text-danger" id="lessTwo">20</h3>
                            <p class="fs-5 text-danger">Books with quantity less than 2</p>
                        </div>
                        <i
                                class="fas fa-book fs-1 text-danger border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">20</h3>
                            <p class="fs-5">Out of stock</p>
                        </div>
                        <i class="fas fa-book fs-1 primary-text-color border rounded-full secondary-bg p-3"></i>
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
<?php include 'biblios.html' ?>
<script src="../assets/js/main.js"></script>

</body>
</html>