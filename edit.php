<?php
require 'db/connection.php';

$id = $_GET['id'];
$query = "SELECT * FROM students WHERE id=$id";
$result = mysqli_query($conn, $query);
$students = mysqli_fetch_assoc($result);
?>

<form action="update.php" method="POST">
     <input type="hidden" name="id" value="<?= $students['id'];?>"placeholder="Masukkan nama">
    <label>Nama</label>
    <input type="text" name="nama" value="<?= $students['name'];?>">

    <label>Email (Gmail)</label>
    <input type="text" name="email" value="<?= $students['email'];?> placeholder="contoh@gmail.com">

    <label>Umur</label>
    <input type="number" name="umur" value="<?= $students['age'];?> placeholder="Contoh: 18">

    <button type="submit">Simpan</button>
</form>