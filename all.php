<?php
include_once 'connection.php';

/**
 * @var $connection PDO
 */

//query
$statement = $connection -> query("SELECT * FROM buku");

//hasil query
$statement -> setFetchMode(PDO::FETCH_ASSOC);

//eksekusi query
$result = $statement -> fetchAll();

//output
header('Content-Type: application/json');
echo json_encode($result);