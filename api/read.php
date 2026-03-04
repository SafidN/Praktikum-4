<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(["message" => "Method tidak diizinkan."]);
    exit;
}
include_once '../config/Database.php';
include_once '../models/Mahasiswa.php';

$database = new Database();
$db = $database->getConnection();
$mahasiswa = new Mahasiswa($db);
$stmt = $mahasiswa->read();
$num = $stmt->rowCount();
if($num > 0) {
    $mhs_arr = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $mhs_item = array(
        "id" => $id,
        "nama" => $nama,
        "npm" => $npm,
        "jurusan" => $jurusan
        );
        
        array_push($mhs_arr, $mhs_item);
    }
    http_response_code(200);
    echo json_encode($mhs_arr);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Data tidak ditemukan."));
    }
?>
