<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        "status" => "error",
        "errors" => ["Metode request tidak diizinkan"]
    ]);
    exit;
}

// Ambil data
$nama  = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$umur  = trim($_POST['umur'] ?? '');

$errors = [];

// Validasi nama
if ($nama === '') {
    $errors[] = "Nama tidak boleh kosong";
} elseif (strlen($nama) < 3) {
    $errors[] = "Nama minimal 3 karakter";
}

// Validasi email Gmail
if ($email === '') {
    $errors[] = "Email wajib diisi";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid";
} elseif (!preg_match('/@gmail\.com$/', $email)) {
    $errors[] = "Email harus menggunakan @gmail.com";
}

// Validasi umur
if ($umur === '') {
    $errors[] = "Umur wajib diisi";
} elseif (!ctype_digit($umur)) {
    $errors[] = "Umur harus berupa angka";
} elseif ($umur < 10 || $umur > 100) {
    $errors[] = "Umur harus antara 10–100 tahun";
}

// Jika error
if (!empty($errors)) {
    echo json_encode([
        "status" => "error",
        "errors" => $errors
    ]);
    exit;
}

// Jika sukses
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
