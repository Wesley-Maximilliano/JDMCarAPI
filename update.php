<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] =="POST"){
    $id = $_POST["id"];
    $nama_mobil = $_POST["nama_mobil"];
    $produsen = $_POST["produsen"];
    $masa_produksi = $_POST["masa_produksi"];
    $sejarah = $_POST["sejarah"];
    $gambar_mobil = $_POST["gambar_mobil"];
    
    
    $perintah ="UPDATE tb_jdm SET nama_mobil='$nama_mobil', produsen ='$produsen', masa_produksi = '$masa_produksi', sejarah ='$sejarah', gambar_mobil ='$gambar_mobil'  WHERE id ='$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek > 0){
        $response["kode"] = 1;
    $response["pesan"] = "Sukses Mengubah data";
    }
    else{
        $response["kode"] = 0;
    $response["pesan"] = "Ada Kesalahan. Gagal Mengubah Data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Data yang diubah ";
}

echo json_encode($response);
mysqli_close($connect);