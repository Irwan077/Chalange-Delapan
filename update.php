<?php
require 'db/connection.php';

$id = $_POST['id'];
$name  = $_POST['nama'];
$email = $_POST['email'];
$umur  = $_POST['umur'];

$query = "UPDATE students SET name = '$name', email = '$email', age = '$umur' WHERE id=$id";
mysqli_query($conn, $query);

header("Location: index.php");
?>