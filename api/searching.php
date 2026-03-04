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
include_once '../models/mahasiswa.php';

$database = new Database();
$db = $database->getConnection();
$mahasiswa = new mahasiswa($db);

// Ambil keyword dari URL
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

if (empty($keyword)) {
    http_response_code(400);
    echo json_encode(["message" => "Keyword tidak boleh kosong."]);
    exit;
}

$stmt = $mahasiswa->search($keyword);
$num = $stmt->rowCount();

if ($num > 0) {
    $data_arr = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data_arr[] = [
            "id" => $row['id'],
            "npm" => $row['npm'],
            "nama" => $row['nama'],
            "jurusan" => $row['jurusan']
        ];
    }

    http_response_code(200);
    echo json_encode($data_arr);
} else {
    http_response_code(404);
    echo json_encode(["message" => "Data tidak ditemukan."]);
}
?>