<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] =="POST"){
    $nama_mobil = $_POST["nama_mobil"];
    $produsen = $_POST["produsen"];
    $masa_produksi = $_POST["masa_produksi"];
    $sejarah = $_POST["sejarah"];
    $gambar_mobil = $_POST["gambar_mobil"];
    
    $perintah ="INSERT INTO tb_jdm(nama_mobil, produsen, masa_produksi, sejarah, gambar_mobil) VALUES('$nama_mobil', '$produsen', '$masa_produksi', '$sejarah', '$gambar_mobil')";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek > 0){
        $response["kode"] = 1;
    $response["pesan"] = "Sukses Menyimpan data";
    }
    else{
        $response["kode"] = 0;
    $response["pesan"] = "Ada Kesalahan. Gagal Menyimpan Data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);