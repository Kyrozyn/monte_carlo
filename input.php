<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Monte Carlo</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="input.php">Input Data Penjualan</a>
            </li>
        </ul>
    </div>
</nav>
<?php

use Medoo\Medoo;

require __DIR__ . '/vendor/autoload.php';

$db = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'mosi',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',]);

$count = $db->count("data");
if (isset($_POST['input'])) {
    if ($db->insert("data", ["no" => $count + 1, "data" => $_POST['input']])) {
        unset($_POST);
        echo "<script>alert('data berhasil disimpan!');</script>";
        $count = $count + 1;
    }
}
?>
<div class="container">
    <div class="row">
        <h2>Jumlah Data saat ini : <?php echo $count ?></h2>
    </div>
    <div class="row">
        <form action="" method="post">
            <div class="form-group">
                <label for="input">Input</label>
                <input type="text"
                       class="form-control" name="input" id="input" aria-describedby="input"
                       placeholder="">
                <small id="input" class="form-text text-muted">Masukkan data Penjualan KE
                    - <?php echo $count + 1 ?></small>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
</body>
</html>