<?php
      session_start();

      if (isset($_SESSION["login"])){
          header("Location: cover.php");
          exit;
      }
  
      require 'function.php';
  
      if( isset($_POST["login"])){
          $username = $_POST["username"];
          $password = $_POST["password"];
  
          $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
  
          //cek username 
          if (mysqli_num_rows($result) === 1){
              
              //dan jika username bernilai 1 yang berarti ada di database berarti username cocok 
              //tahap selanjutnya adalah cek password apakah cocok dengan password yang ada di database
              //cek password
              $row = mysqli_fetch_assoc($result);
              if(password_verify($password, $row['password'])){
                  // set session 
                  $_SESSION["login"] = true;
  
                  header('Location: cover.php');
                  exit;
              }
              
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
        <h1 class="h3 mb-3 fw-normal text-white">Please sign in</h1>

        <div class="form-floating">
          <input type="text" name="username" id="username" class="form-control"   />
          <label for="username">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" id="password" class="form-control"  />
          <label for="password">Password</label>
        </div>
        <div>
          <a href="register.php">Register</a>
        </div>
        <br /><br />
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Sign in</button>
      </form>
    </main>
  </body>
</html>
