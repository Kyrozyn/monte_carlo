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
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Input Data Penjualan</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <h1>Simulasi Data Penjualan</h1>
        <h2>Spirulina Mask, Super Protein, Slimming Tea dan Hyper Grow</h2>
    </div>
    <hr>
    <div class="row">
        <h3>Data penjualan sudah di input:</h3>
    </div>
    <div class="row">
        <table class="table" id="data">
            <thead>
            <tr>
                <th>x hari kebelakang</th>
                <th>Jumlah barang</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $data = [];
            for ($a = 1; $a < 101; $a++) {
                $rand = rand(0, 50);
                array_push($data, $rand);
                ?>
                <tr>
                    <td><?php echo($a) ?></td>
                    <td><?php echo($rand) ?></td>
                </tr>
                <?php
            }
            $jumlah_data = count($data);
            ?>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="row">
        <h4>Tabel Interval</h4>
    </div>
    <div class="row">
        <table class="table" id="interval">
            <thead class="thead-dark">
                <tr>
                    <th>Interval</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <?php
            $category = 6;
            $limitxarray = [];
            $limityarray = [];
            $countarray = [];
            $probarray = [];
            $persenarray = [];
            $min = min($data);
            $max = max($data);
            $limit = ceil((($max - $min) / $category));
            sort($data);
            for ($i = 0; $i < $category; $i++) {
                $count = 0;
                foreach ($data as $key => $number) {
                    if ($number <= (($min + ($limit - 1)) + ($i * $limit))) {
                        $count++;
                        unset($data[$key]);
                    }
                }
                $limitx = $min + ($i * $limit);
                $limity = ($min + ($limit - 1)) + ($i * $limit);
                if ($limity > $max) {
                    $limity = $max;
                }
                array_push($limitxarray,$limitx);
                array_push($limityarray,$limity);
                array_push($countarray,$count);
                //menghitung probabilitas
                $prob = round($count/$jumlah_data,2);
                array_push($probarray,$prob);
                //menghitung persen
                $persen = round($prob*100,2,PHP_ROUND_HALF_DOWN);
                array_push($persenarray,$persen);
                ?>
                <tr>
                    <td><?php echo($limitx . '-' . $limity) ?></td>
                    <td><?php echo($count) ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <hr>

    <div class="row">
        <table class="table" id="interval">
            <thead class="thead-dark">
                <tr>
                    <th>Interval</th>
                    <th>Probabilitas</th>
                    <th>Persen</th>
                    <th colspan="2">Interval Kelas</th>
                    <th>Probabilitas Kumulatif</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $interval_kelas_x_array = [];
                    $interval_kelas_y_array = [];
                    $probkum = 0;
                    for($a=0;$a<$category;$a++){
                        if($a == 0){
                            $interval_kelas_y = 99;
                            array_push($interval_kelas_y_array,$interval_kelas_y);
                        }else{
                            $interval_kelas_y = $interval_kelas_x_array[$a-1]-1;
                            array_push($interval_kelas_y_array,$interval_kelas_y);
                        }
                        $interval_kelas_x = $interval_kelas_y - $persenarray[$a]+1;
                        array_push($interval_kelas_x_array,$interval_kelas_x);
                        $probkum = $probkum+$probarray[$a];
                        ?>
                        <tr>
                            <td><?php echo $limitxarray[$a]. "-" . $limityarray[$a]?></td>
                            <td><?php echo $probarray[$a]?></td>
                            <td><?php echo $persenarray[$a]?></td>
                            <td><?php echo $interval_kelas_x?></td>
                            <td><?php echo $interval_kelas_y?></td>
                            <td><?php echo $probkum?></td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="row">
        <h4>Interval Nilai Random</h4>
    </div>
    <div class="row">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Interval Nilai Random</th>
                <th>Hasil Interval</th>
            </tr>
            </thead>
            <tbody>
        <?php
        //tampilkan hasil interval
        for($a=0;$a<$category;$a++){
            echo"<tr>
                <td>".$interval_kelas_x_array[$a]."-".$interval_kelas_y_array[$a]."</td>
                <td>".$limitxarray[$a]."-".$limityarray[$a]."</td>
            </tr>";
        }
            ?>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="row">
        <h4>Simulasi</h4>
    </div>
    <div class="row">
        <table class="table" id="simulasi">
            <thead>
            <tr>
                <th>Hari Ke - </th>
                <th>Nilai Random</th>
                <th>Hasil</th>
                <th>Jumlah Yang Terjual</th>
            </tr>
            </thead>
            <tbody>


        <?php
            //menggunakan algoritma Multiplicative Random Number Generator
            $z0 = 12357;
            $m = 111111111;
            $a = 77;
            //$c = 9;
            $zi = [];
            for($i=0;$i<90;$i++){
                if($i == 0){
                    $zikurangsatu = $z0;
                }
                else{
                    $zikurangsatu = $zi[$i-1];
                }
                //rumus lcg... tidak terpakai.. tapi boleh dicoba
                //$zip = ($a*$zikurangsatu+$c)%$m;
                //rumus mrng
                $zip = ($a*$zikurangsatu)%$m;
                array_push($zi,$zip);
                $min = 0;
                $max = 99;
                $ui = number_format($zip/$m,4);
                $end = ceil($min+($zip/$m)*($max-$min+1));
                //echo $zip." dengan u1 = ".$ui." dengan variate ".$end."<br>";
                for($a=0;$a<$category;$a++){
                    if($end > $interval_kelas_x_array[$a] AND $end < $interval_kelas_y_array[$a]){
                        $terpilih = $a;
                    }
                }
                $min1 = $limitxarray[$terpilih];
                $max1 = $limityarray[$terpilih];
                $ui1 = number_format($zip/$m);
                $end1 = round($min1+($zip/$m)*($max1-$min1+1),0,2);
                //terjadi bug dimana mungkin karena proses pembulatannya yang menjadi keatas. Hasilnya bisa melebihi max
                if ($end1 > $max1) {
                    $end1 = $max1;
                }
                ?>
                <tr>
                    <td scope="row"><?php echo $i+1?></td>
                    <td><?php echo $end?></td>
                    <td><?php echo $min1." - ".$max1?></td>
                    <td><?php echo $end1?></td>
                </tr>
        <?php
            }
        ?>
            </tbody>
        </table>
    </div>

</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#data').DataTable({
            "searching": false,
            "oLanguage": {
                "sLengthMenu": "Tampilkan _MENU_ Data",

            },
            "language": {
                "info": "Menampilkan Data ke _START_ sampai _END_ dari _TOTAL_ data",
            }
        });
        $('#simulasi').DataTable({
            "searching": false,
            "oLanguage": {
                "sLengthMenu": "Tampilkan _MENU_ Data",

            },
            "language": {
                "info": "Menampilkan Data ke _START_ sampai _END_ dari _TOTAL_ data",
            }
        });
    });
</script>
</body>
</html>