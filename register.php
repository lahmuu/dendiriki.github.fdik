<?php
  require 'function.php';

  if(isset($_POST['register'])) {
    if(register($_POST) > 0) {

      echo "<script>
      alert('user berhasil ditambahkan');
      </script>";
   
    }else{
      echo mysqli_error($conn);
    }
  
  
  
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.88.1" />
    <title>Signin Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/" />

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet" />
  </head>
  <body class="text-center bg-dark">
    <main class="form-signin">
      <form action="" method="post">
        <img class="mb-4" src="images/logo-dinamika1.png" alt="" />
            
        <div class="form-floating">
          <input type="text" name="username" id="username" class="form-control"/>
          <label for="username">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" id="password" class="form-control"  />
          <label for="password">Password</label>
        </div>
        <div class="form-floating">
          <input type="password2" name="password2" id="password2" class="form-control"  />
          <label for="password2">Konfirmasi password Password</label>
        </div>

        <br /><br />
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="register">Register</button>
      </form>
    </main>
  </body>
</html>
