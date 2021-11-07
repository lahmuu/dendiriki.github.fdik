<?php
   session_start();

   if( !isset($_SESSION["login"])){
       header("Location: signin.php");
       exit;
   }
   
   require 'function.php';
   
   
   //ambil data di url
   $id = $_GET["id"];
   
   //query data mahasiswa berdasarkan id 
   $data = query("SELECT * FROM databerita WHERE id = $id")[0];
   
   
   // $conn = mysqli_connect("localhost","root","","phpdasar");
   
   //cek apakah tombol sumbit sudah di tekan atau belum 
   if(isset($_POST["submit"])){
   
       //cek apakah data berhasil diubah atau tidak 
       if(ubah($_POST) > 0 ){
           echo "<script>
               alert('data berhasil diubah');
               document.location.href = 'cover.php';
           </script>";
       }else{
           echo "<script>
           alert('data gagal diubah');
           document.location.href = 'cover.php';
       </script>";
       mysqli_error($conn);
       }

}

   
   
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
  <body class="text-white bg-dark">
    
    
    <nav class="navbar navbar-expand-lg navbar-dark  bg-warning shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="">halaman Input Data</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="cover.php">List Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="inputdata.php">Input Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
      <h1>Tambah Data</h1>
      <div class="container">
        <div class="row">
        <div class="col-md-8 blog-content-area">
      <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $data["id"]?>">
        <input type="hidden" name="gambarlama" value="<?php echo $data["gambar"]?>">
          <ul>
              <li>
                  <label for="namaberita">Masukkan Nama Berita:</label>
                  <input type="text" name="namaberita" id="namaberita" required value="<?php echo $data['namaberita']; ?>">
              </li>
              <li>
                  <label for="penulis">Masukkan Nama Penulis:</label>
                  <input type="text" name="penulis" id="penulis" required value="<?php echo $data['penulis']; ?>">
              </li>
              <li>
                  <label for="tanggal"> Masukan Tanggal Berita</label>
                  <input type="text" name="tanggal" id="tanggal" required value="<?php echo $data['tanggal']; ?>">
              </li>
              <li>
                  <label for="gambar">Masukan gambar yang ingin anda tambahkan</label>
                  <input type="file" name="gambar" id="gambar">
              </li>
              <li>
                  <label for="isiberita">Masukan Berita yang ingin anda ketik</label>
                  <br>
                  <textarea name="isiberita" id="isiberita" cols="150" rows="80" required value="<?php echo $data['isiberita']; ?>"></textarea>
              </li>
              <li>
              <label for="deskripsi">Masukan deskripsi yang ingin anda ketik</label>
                  <br>
                  <textarea name="deskripsi" id="deskripsi" cols="150" rows="40" required value="<?php echo $data['deskripsi'];?>"></textarea>
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data !</button>
            </li>
          </ul>
      </form>
      </div>
    </div>
   
      <footer class="mt-auto text-white-50">
        <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
      </footer>
    </div>
  </body>
</html>