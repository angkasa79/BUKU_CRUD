
<?php
include_once 'connection.php';
/**
 * @var $connection PDO
 */

$isbn = $_POST['isbn'];
$judul = $_POST['judul'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$abstrak = $_POST['abstrak'];
$update = $_POST['update'];

$check = $connection -> query("SELECT * FROM `buku` WHERE `isbn` = '$update'");
$check -> setFetchMode(PDO::FETCH_ASSOC);
$result = $check -> fetchAll();
$response =[];

$statement = $connection -> prepare("UPDATE `buku` SET `isbn` = '$isbn', `judul` = '$judul', `jumlah` = '$jumlah', `tanggal` = '$tanggal', `abstrak` = '$abstrak' WHERE `buku`.`isbn` = '$update'");
$statement -> execute();

if (count($result) > 0) {
    $response['status']='succcess';
    $response['message']='Berhasil update data';
    $response['data'] = $result;
}

else {
    $response['status']='failed';
    $response['message']='Gagal update data';
}

header('Content-Type: application/json');
echo json_encode($response,JSON_PRETTY_PRINT);