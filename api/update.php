<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
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
$mahasiswa->id = $data->id;
$mahasiswa->npm = $data->npm;
$mahasiswa->nama = $data->nama;
$mahasiswa->jurusan = $data->jurusan;

if($mahasiswa->update()) {
    http_response_code(200);
    echo json_encode(array("message" => "Data mahasiswa berhasil diperbarui."));
} else {
    http_response_code(503);
    echo json_encode(array("message" => "Gagal memperbarui data."));
}
?>
