<?php

session_start();

require 'fungsi.php';
$id = $_GET["id"];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0]; //

// checking is submit button has been press yet.
if ( isset($_POST["submit"]) ){
    
    if( edit($_POST) > 0 ){
       echo "
            <script>
                alert('Data berhasil diubah!')
                document.location.href = 'index.php'
            </script>
       "; 
    } else {
        echo "
            <script>
                alert('Data gagal diubah!')
                document.location.href = 'index.php'
            </script>
       "; 
    }
}
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
            margin-top:5rem;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
        }

        .warna{
            margin: 5px;
            padding: 3px;
            background-color: aqua;
        }

        ul li{
            list-style-type: none;
        }

        .text1{
            text-align: center;
        }

        .tg  {border-collapse:collapse;border-spacing:0;}
        .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg .tg-7g4e{background-color:#1d868d1c;border-color:#ffffff;text-align:center;vertical-align:middle}
        .tg .tg-v0mg{border-color:#ffffff;text-align:center;vertical-align:middle}
        .tg .tg-kybm{background-color:#dae8fc;border-color:#ffffff;color:#000000;text-align:center;vertical-align:middle}

    </style>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container">
        <div class="card" style="width: 21rem;">
            
            <div class="card-body">
            <h5 class="card-title text1">Edit Data Mahasiswa</h5>
            <div class="warna"></div>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tg">
                    <thead>
                      <tr>
                        <input type="hidden" name="Id" value="<?= $mhs["id"]; ?>">
                      </tr>
                      <tr>
                        <th class="tg-7g4e" colspan="3">Nama</th>
                        <th class="tg-v0mg">:</th>
                        <th class="tg-kybm"><input type="text" id="Nama" name="Nama" required value="<?= $mhs["nama"]; ?>"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="tg-7g4e" colspan="3">Nim</td>
                        <td class="tg-v0mg">:</td>
                        <td class="tg-kybm"><input type="text" id="Nim" name="Nim" required value="<?= $mhs["nim"]; ?>"></td>
                      </tr>
                      <tr>
                        <td class="tg-7g4e" colspan="2" rowspan="3">Nilai</td>
                        <td class="tg-7g4e">Tugas</td>
                        <td class="tg-v0mg">:</td>
                        <td class="tg-kybm"><input type="text" id="Tugas" name="Tugas" required value="<?= $mhs["tugas"]; ?>"></td>
                      </tr>
                      <tr>
                        <td class="tg-7g4e">UTS</td>
                        <td class="tg-v0mg">:</td>
                        <td class="tg-kybm"><input type="text" id="Uts" name="Uts" required value="<?= $mhs["uts"]; ?>"></td>
                      </tr>
                      <tr>
                        <td class="tg-7g4e">UAS</td>
                        <td class="tg-v0mg">:</td>
                        <td class="tg-kybm"><input type="text" id="Uas" name="Uas" required value="<?= $mhs["uas"]; ?>"></td>
                      </tr>
                    </tbody>
                    </table>
                    <button style="margin-top: 5px ;" type="submit" name="submit" class="btn btn-primary">Update Data!</button>
            </form>
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