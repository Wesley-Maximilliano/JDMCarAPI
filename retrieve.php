<?php
require("koneksi.php");

$perintah = "SELECT*FROM tb_jdm";
$eksekusi = mysqli_query($connect, $perintah);

$cek = mysqli_affected_rows($connect);
if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();
    
    while($get = mysqli_fetch_object($eksekusi)){
        $var["id"] = $get->id;
        $var["nama_mobil"] = $get->nama_mobil;
        $var["produsen"] = $get->produsen;
        $var["masa_produksi"] = $get->masa_produksi;
        $var["sejarah"] = $get->sejarah;
        $var["gambar_mobil"] = $get->gambar_mobil;
        
        
        array_push($response["data"], $var);
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}
echo json_encode($response);
mysqli_close($connect);