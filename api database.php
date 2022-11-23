#Safitri Diwanti Lestari#
#20051397039#
#2020A#

<?php
header("Content-Type: JSON");

$koneksi = mysqli_connect ("localhost", "root", "", "Akademik");

if($_SERVER['REQUEST_METHOD']==='GET'){
    $sql = "SELECT * FROM mahasiswa ";
    $query = mysqli_query ($koneksi, $sql);
    $array_data = array();
    while($data = mysqli_fetch_assoc($query)){
        $array_data[] = $data;
    }
    echo json_encode($array_data);
}else if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $ttl = $_POST['ttl'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $sql = "INSERT INTO mahasiswa (nim, nama, ttl, jk, agama, alamat) VALUES('$nim','$nama','$ttl','$jk','$agama',$alamat')";
    $cek = mysqli_query($koneksi, $sql);

    if($cek){
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    } else {
        $data = [
            'gagal' => "gagal"
        ];
        echo json_encode([$data]);
    }
}else if($_SERVER['REQUEST_METHOD']=== 'DELETE'){
    $nim = $_GET['nim'];
    $sql = "DELETE FROM mahasiswa WHERE nim ='$nim";
    $cek = mysqli_query($koneksi, $sql);

    if($cek){
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    } else {
        $data = [
            'gagal' => "gagal"
        ];
        echo json_encode([$data]);
    }
}else if($_SERVER['REQUEST_METHOD']=== 'PUT'){
    $nim = $_GET['nim'];
    $nama = $_GET['nama'];
    $ttl = $_GET['ttl'];
    $jk = $_GET['jk'];
    $agama = $_GET['agama'];
    $alamat = $_GET['alamat'];

    $sql = "UPDATE mahasiswa SET nama='$nama', ttl='$ttl', jk='$jk', agama='$agama', alamat='$alamat' WHERE nim='$nim'";
    $cek = mysqli_query($koneksi, $sql);

    if($cek){
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    } else {
        $data = [
            'gagal' => "gagal"
        ];
        echo json_encode([$data]);
    }
}