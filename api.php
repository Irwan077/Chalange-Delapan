<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        "status" => "error",
        "errors" => ["Metode request tidak diizinkan"]
    ]);
    exit;
}

$nama  = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$umur  = trim($_POST['umur'] ?? '');

$errors = [];

if ($nama === '') {
    $errors[] = "Nama tidak boleh kosong";
} elseif (strlen($nama) < 3) {
    $errors[] = "Nama minimal 3 karakter";
}

if ($email === '') {
    $errors[] = "Email wajib diisi";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid";
} elseif (!preg_match('/@gmail\.com$/', $email)) {
    $errors[] = "Email harus menggunakan @gmail.com";
}

if ($umur === '') {
    $errors[] = "Umur wajib diisi";
} elseif (!ctype_digit($umur)) {
    $errors[] = "Umur harus berupa angka";
} elseif ($umur < 10 || $umur > 100) {
    $errors[] = "Umur harus antara 10–100 tahun";
}

if (!empty($errors)) {
    echo json_encode([
        "status" => "error",
        "errors" => $errors
    ]);
    exit;
}

echo json_encode([
    "status" => "success",
    "message" => "Data valid",
    "data" => [
        "nama"  => htmlspecialchars($nama),
        "email" => htmlspecialchars($email),
        "umur"  => (int)$umur
    ],
    "waktu" => date("Y-m-d H:i:s")
]);
