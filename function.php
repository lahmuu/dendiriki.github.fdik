<?php
     $conn = mysqli_connect("localhost","root","","kampus");

     function query($query){
        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = [];
        while($row=mysqli_fetch_assoc($result)){
            $rows [] = $row;
        }
        return $rows;
    }

    function tambah($data){
        global $conn;
        //ambil data dari tiap elemen dalam form 

        $namaberita = $data["namaberita"];
        $penulis = $data["penulis"];
        $tanggal = $data["tanggal"];
        $isiberita = $data["isiberita"];
        $deskripsi = $data["deskripsi"];
        $gambar = $data["gambar"];

        //upload gambar 
        $gambar = upload();
        if( !$gambar ){
            return false;
        }

        $query = "INSERT INTO databerita VALUES ('','$namaberita','$penulis','$tanggal','$isiberita','$deskripsi','$gambar')";

        mysqli_query($conn,$query);
    
        return mysqli_affected_rows($conn);
    
        
    }

    function hapus($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM databerita WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;
        $id = $data['id'];
        $namaberita = $data["namaberita"];
        $penulis =  $data["penulis"];
        $tanggal =  $data["tanggal"];
        $isiberita = $data["isiberita"];
        $deskripsi = $data["deskripsi"];
        $gambarLama = $data["gambarlama"];

        //cek apakah user pilih gambar baru atau tidak 

        if($_FILES['gambar']['error'] === 4){
            $gambar = $gambarLama;
        }else {
            $gambar = upload();
        }

        $query = "UPDATE databerita SET 
                namaberita = '$namaberita',
                penulis = '$penulis',
                tanggal = '$tanggal',
                isiberita = '$isiberita',
                deskripsi = '$deskripsi',
                gambar = '$gambar'
                WHERE id = $id     
        ";

        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }

    function upload(){
        
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        //cek apakah tidak ada gambar yang di upload
        if( $error === 4){
            echo "<script>
                alert('pilih gambar terlebih dahulu')
            </scrippt>"; 
            return false;
        }

        //cek apakah yang di upload adalah gambar yang

        $ekstensiGambarValid = ['jpg','jpeg','png'];
        $ekstensiGambar = explode('.',$namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo "<script>
                alert('yang anda masukkan bukan gambar');
            </script>";

            return false;
        }

        // cek ukuran file yang terlalu besar 
        if ($ukuranFile > 10000000 ){
            echo "<script>
                alert('ukuran file anda terlalu besar');
            </script>";

            return false;
        }

        //lolos pengecekan, gambar siap diupload
        //generate nama gambar baru 

        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensiGambar;

        move_uploaded_file($tmpName,'images/upload/' . $namafilebaru );

        return $namafilebaru;

    }


    //untuk resgitrasi password

    function register($data){
        global $conn;
        
        $username = strtolower(stripslashes ($data['username']));
        $password = mysqli_real_escape_string($conn, $data['password']);
        $password2 = mysqli_real_escape_string($conn, $data['password2']);

        //cek username sudah ada apa belum  

        $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

        if(mysqli_fetch_assoc($result)){
            echo "<script>
            alert('usrname yang di pilih sudah terdaftar harap mengunakan nama yang lain');
        </script>";

            return false;
        }

        //cek konfirmasi password
    
        if( $password !== $password2) {
            echo "<script>
            alert('konfirmasi password tidak sesuai');
        </script>";

        return false;
        }

           //enkripsi password 

           $password = password_hash($password, PASSWORD_DEFAULT);

           //tambahkan username baru ke database
   
           mysqli_query($conn, "INSERT INTO users VALUES('', '$username','$password')");
   
           return mysqli_affected_rows($conn);
   
       


    }

    


?>