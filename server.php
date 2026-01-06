<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Akses tidak valid ❌");
}

// Ambil & bersihkan data
$nama  = htmlspecialchars(trim($_POST['nama'] ?? ''));
$email = htmlspecialchars(trim($_POST['email'] ?? ''));
$umur  = htmlspecialchars(trim($_POST['umur'] ?? ''));

$errors = [];

/* =====================
   VALIDASI SERVER
   ===================== */

// Nama: minimal 3 huruf
if ($nama === '') {
    $errors[] = "Nama tidak boleh kosong";
} elseif (strlen($nama) < 3) {
    $errors[] = "Nama minimal 3 karakter";
}

// Email: wajib gmail
if ($email === '') {
    $errors[] = "Email wajib diisi";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid";
} elseif (!preg_match('/@gmail\.com$/', $email)) {
    $errors[] = "Email harus menggunakan @gmail.com";
}

// Umur: angka 10–100
if ($umur === '') {
    $errors[] = "Umur wajib diisi";
} elseif (!ctype_digit($umur)) {
    $errors[] = "Umur harus berupa angka";
} elseif ($umur < 10 || $umur > 100) {
    $errors[] = "Umur harus antara 10 - 100 tahun";
}

/* =====================
   TAMPILKAN HASIL
   ===================== */

echo "<style>
body { font-family: Arial; background:#f4f6f8; }
.box {
    width:400px;
    margin:80px auto;
    background:#fff;
    padding:20px;
    border-radius:8px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}
.error { color:#721c24; background:#f8d7da; padding:10px; border-radius:5px; }
.success { color:#155724; background:#d4edda; padding:10px; border-radius:5px; }
a { display:inline-block; margin-top:15px; }
</style>";

echo "<div class='box'>";

if (!empty($errors)) {
    echo "<div class='error'><h3>❌ Validasi Gagal</h3><ul>";
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul></div>";
    echo "<a href='index.php'>⬅ Kembali ke Form</a>";
} else {
    echo "<div class='success'>
            <h3>✅ Data Valid</h3>
            <p><strong>Nama:</strong> $nama</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Umur:</strong> $umur tahun</p>
          </div>";
    echo "<a href='index.php'>⬅ Isi Lagi</a>";
}

echo "</div>";
