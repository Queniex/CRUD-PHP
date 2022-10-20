<?php

session_start();
require 'fungsi.php';

$id = $_GET["id"];
$mhs = query("SELECT id, nama, nim, tugas, uts, uas, round((tugas+uts+uas)/3,1) AS akhir FROM mahasiswa WHERE id = $id")[0]; //

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
        .container{
            margin-top:10rem;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
        }

        .warna{
            margin: 5px;
            padding: 3px;
            background-color: aqua;
        }

        em{
            text-decoration: underline;
            text-underline-offset: 0.25em;
        }

        .text1{
            text-align: center;
        }


    </style>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container">
        <div class="card" style="width: 23rem;">
            
            <div class="card-body">
            <h5 class="card-title text1">Data Singkat Mahasiswa</h5>
            <div class="warna"></div>
            <ul class="list-group text2">
                <li class="list-group-item">Nama : <em><?= $mhs["nama"]; ?></em> </li>
                <li class="list-group-item">Nim : <em><?= $mhs["nim"]; ?></em></li>
                <li class="list-group-item">Nilai Akhir : <em><?= $mhs["akhir"]; ?></em></li>
            </ul>
            <a style="margin-top: 5px ;" href="index.php" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>

<!-- JQuery -->
<script
src="https://code.jquery.com/jquery-3.6.1.min.js"
integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
crossorigin="anonymous"></script>
<!-- Server -->
<script src="/fetch/script.js"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>