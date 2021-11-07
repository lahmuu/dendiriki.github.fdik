<?php
   session_start();

   if( !isset($_SESSION["login"])){
       header("Location: signin.php");
       exit;
   }


    require 'function.php';
    
     //pagination
    //konfigurasi
    $jumlahdataperhalaman = 3;
    $jumlahdata = count(query("SELECT * FROM databerita"));
    $jumlahhalaman =ceil($jumlahdata / $jumlahdataperhalaman) ;
    // $halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1; ini cara if elase yang baru
    if(isset($_GET["halaman"])){
        $halamanaktif = $_GET["halaman"];
    }else{
        $halamanaktif = 1;
    }
    $awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman ;

    $databerita = query("SELECT * FROM databerita LIMIT $awaldata, $jumlahdataperhalaman ");

   
   
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <!-- <link href="cover.css" rel="stylesheet" /> -->
  </head>
  <body >

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Input Data Berita</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-auto mx-lg-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cover.php">Data Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inputdata.php">Input</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <!-- <header class="mb-auto">
        <div>
          <h3 class="float-md-start mb-0">Input Data Berita</h3>
          <nav class="nav nav-masthead  float-md-end">
            <a class="nav-link active" aria-current="page" href="cover.php">Data Berita</a>
            <a class="nav-link" href="inputdata.php">Input</a>
            <a class="nav-link" href="logout.php">Logout</a>
          </nav>
        </div>
      </header> -->

      

      <table class="table text-white" border="0" cellspacing="10" cellpadding="" id="dataTable3">
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
              <a href="ubah.php?id=<?php echo $row["id"];?>">uabh</a>
              <a href="hapus.php?id=<?php echo $row["id"];?>" onclick="return confirm('yakin?')">hapus</a>
            </td>
            <td><?php echo $row["namaberita"];?></td>
            <td><?php echo $row["tanggal"];?></td>
            <td><?php echo $row["penulis"]; ?></td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>

      </table>
      <?php for($i = 1; $i <= $jumlahhalaman; $i++) : ?>
      <?php if( $i == $halamanaktif): ?>
        <a href="?halaman=<?php echo $i; ?>" style="font-weight: bold; color: red;"><?php echo $i; ?></a>
      <?php else: ?>
        <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
      <?php endif; ?>
      <?php endfor; ?>

      <footer class="mt-auto text-white-50">
        <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
      </footer>
    </div>

    <script>
$(document).ready(function() {
$('#dataTable3').DataTable( {
    dom: 'Bfrtip',
    buttons: [
       'copy', 'csv', 'excel', 'pdf', 'print',
    ]
} );
} );

</script>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script><script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>