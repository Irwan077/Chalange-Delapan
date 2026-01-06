<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Validasi Keren</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }
        .container {
            width: 350px;
            margin: 80px auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Validasi</h2>

    <form action="server.php" method="POST">
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukkan nama">

        <label>Email (Gmail)</label>
        <input type="text" name="email" placeholder="contoh@gmail.com">

        <label>Umur</label>
        <input type="text" name="umur" placeholder="Contoh: 18">

        <button type="submit">Kirim Data</button>
    </form>
</div>

</body>
</html>
