<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["message" => "Method tidak diizinkan."]);
    exit;
}

include_once '../config/Database.php';
include_once '../models/mahasiswa.php';
$database = new Database();
$db = $database->getConnection();
$mahasiswa = new mahasiswa($db);
$data = json_decode(file_get_contents("php://input"));

if(!empty($data->npm) && !empty($data->nama) && !empty($data->jurusan)) {
    $mahasiswa->npm = $data->npm;
    $mahasiswa->nama = $data->nama;
    $mahasiswa->jurusan = $data->jurusan;
    if($mahasiswa->create()) {
        http_response_code(201); // Created
        echo json_encode(array("message" => "Mahasiswa berhasil
        ditambahkan."));
    } else {
        http_response_code(503); // Service Unavailable
        echo json_encode(array("message" => "Gagal menambahkan mahasiswa."));
    }
} else {
    http_response_code(400); // Bad Request
    echo json_encode(array("message" => "Data tidak lengkap."));
}
?>