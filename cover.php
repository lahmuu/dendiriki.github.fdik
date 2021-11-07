<?php
    require 'function.php';
    $databerita = query("SELECT * FROM databerita ORDER BY id DESC");

   
   
?>


<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.88.1" />
    <title>Cover Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cover/" />

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>

      table{
        color: aliceblue;
      }

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
    <link href="cover.css" rel="stylesheet" />
  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="mb-auto">
        <div>
          <h3 class="float-md-start mb-0">Input Data Berita</h3>
          <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link active" aria-current="page" href="cover.php">Data Berita</a>
            <a class="nav-link" href="inputdata.php">Input</a>
            <a class="nav-link" href="logout.php">Logout</a>
          </nav>
        </div>
      </header>
      <table border="0" cellspacing="10" cellpadding="">
        <tr>
          <td>no</td>
          <td>id</td>
          <td>aksi</td>
          <td>nama berita</td>
          <td>tanngal berita</td>
          <td>penulis</td>
        </tr>

        <?php $i=1; ?>
        <?php foreach ($databerita as $row): ?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $row["id"];?></td>
            <td>
              <a href="">uabh</a>
              <a href="">hapus</a>
            </td>
            <td><?php echo $row["namaberita"];?></td>
            <td><?php echo $row["tanggal"];?></td>
            <td><?php echo $row["penulis"]; ?></td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>

      </table>
      <footer class="mt-auto text-white-50">
        <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
      </footer>
    </div>
  </body>
</html>