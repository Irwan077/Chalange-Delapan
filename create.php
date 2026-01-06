<?php
require __DIR__ . '/db/connection.php';

$name  = $_POST['nama'];
$email = $_POST['email'];
$umur  = $_POST['umur'];

$query = "INSERT INTO students (name, email, age)
          VALUES ('$name', '$email', '$umur')";

if (mysqli_query($conn, $query)) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . mysqli_error($conn);

header("Location: index.php");
}
?>
