
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" integrity="sha512-5PV92qsds/16vyYIJo3T/As4m2d8b6oWYfoqV+vtizRB6KhF1F9kYzWzQmsO6T3z3QG2Xdhrx7FQ+5R1LiQdUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="../assets/style/style.css" rel="stylesheet" type="text/css">

</head>
<body id="loginBody" >
<div class="col-12 d-flex   align-items-center justify-content-center flex-column  ">
  <div class="p-5 col-lg-5  col-md-6   col-10 formContainer  ">
    <h3 class="h3 text-center text-black mt-4">Login</h3>
    <form method="post">
      <h4 class="h4 text-center text-danger  mt-5 d-none" id="checkLabel"></h4>
      <div class="form-group mt-2">
        <input type="email" class="form-control  " id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group mt-3">
        <input type="password" class="form-control  " id="inputPassword" placeholder="Password">
      </div>
      <div class="d-flex   align-items-center   flex-column">
        <button type="button" class="  col-4 btn btn-primary mt-5" style="border-radius: 30px" onclick="checkLogin()">Login</button>

      </div>
    </form>
  </div>
</div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>