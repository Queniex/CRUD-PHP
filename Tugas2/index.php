<?php
session_start();

require 'fungsi.php';

$mahasiswa = query("SELECT id, nama, nim, tugas, uts, uas, round((tugas+uts+uas)/3,1) AS akhir FROM mahasiswa");

if (isset($_POST["submit"]) ){
    if( add($_POST) > 0 ){
       echo "
            <script>
                alert('Data berhasil ditambahkan!')
                document.location.href = 'index.php'
            </script>
       "; 
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!')
                document.location.href = 'index.php'
            </script>
       "; 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Table</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style type="text/css">
    .tg  {
        border-collapse:collapse;
        border-spacing:0;
        }

    .tg td{
            border-color:black;
            border-style:solid;
            border-width:1px;
            font-family:Arial, sans-serif;
            font-size:14px;
            overflow:hidden;
            padding:10px 5px;
            word-break:normal;
            }

    .tg th{
        border-color:black;
        border-style:solid;
        border-width:1px;
        font-family:Arial, sans-serif;
        font-size:14px;
        font-weight:normal;
        overflow:hidden;
        padding:10px 5px;
        word-break:normal;
        }

    .tg .tg-r1e8{
        background-color:#dae8fc;
        border-color:inherit;
        text-align:center;
        vertical-align:middle
        }

    .tg .tg-kfkg{
        background-color:#dae8fc;
        border-color:inherit;
        text-align:center;
        vertical-align:top
        }

    .tg .tg-roi2{
        background-color:#c0c0c0;
        border-color:inherit;
        text-align:center;
        vertical-align:middle
        }

    .tg .tg-x6qq{
        background-color:#dae8fc;
        border-color:inherit;
        text-align:left;
        vertical-align:top
        }

    *{
        padding: 0;
        margin: 0;
        /* border: 1px solid red; */
        }
            
    .satu{
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        padding-top: 0.5rem;
        padding-bottom: 3.5rem;
        }

    .createx{
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        }

    .text{
        padding: 10px;
        text-align: center;
        background-color: rgba(201, 201, 201, 0.39);
        }   
        
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-lboi{background-color:#c0c0c0;border-color:inherit;text-align:center;vertical-align:middle}
    .tg .tg-9wq8{background-color:#efefef;border-color:inherit;text-align:center;vertical-align:middle}
    .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-0pky{border-color:inherit;text-align:center;vertical-align:top}
    </style>
    </head>
    <body>
    <br>
    <hr>

    <div class="text">
    <h1>Database Nilai Mahasiswa Politeknik Negeri Jakarta</h1>
    <h3>Tahun 2022/2023</h3>
    </div>
    <hr>

    <div class="utama">
    <div class="createx">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Modal3">Tambah Data</button>
    </div>

    <div class="satu">
            <table class="tg">
            <thead>
            <tr>
                <th class="tg-roi2" rowspan="2">No</th>
                <th class="tg-roi2" rowspan="2">Nama</th>
                <th class="tg-roi2" rowspan="2">Nim</th>
                <th class="tg-roi2" colspan="4">Nilai</th>
                <th class="tg-roi2" colspan="3" rowspan="2">Kontrol</th>
            </tr>
            <tr>
                <th class="tg-roi2">Tugas</th>
                <th class="tg-roi2">UTS</th>
                <th class="tg-roi2">UAS</th>
                <th class="tg-roi2">Akhir</th>
            </tr>
            </thead>
            <tbody>
                <!-- Mulai Perulangan -->
                <?php $i = 1; ?>
                <?php foreach( $mahasiswa as $row ) : ?>
                    <td class="tg-r1e8"><?= $i; ?></td>
                    <td class="tg-r1e8"><?= $row["nama"]; ?></td>
                    <td class="tg-r1e8"><?= $row["nim"]; ?></td>
                    <td class="tg-r1e8"><?= $row["tugas"]; ?></td>
                    <td class="tg-r1e8"><?= $row["uts"]; ?></td>
                    <td class="tg-r1e8"><?= $row["uas"]; ?></td>
                    <td class="tg-r1e8"><?= $row["akhir"]; ?></td>
                    <form action="" method="POST" enctype="multipart/form-data">
                    <td class="tg-r1e8"><a href="baca.php?id=<?= $row["id"]; ?>" class="btn btn-outline-primary" name="baca"><img width="20px" height="20px" src="tugas_web/eye.png" alt=""></a></td>

                    <td class="tg-r1e8"><a href="edit.php?id=<?= $row["id"]; ?>" class="btn btn-outline-success" name="edit"><img width="20px" height="20px" src="tugas_web/pen.png" alt=""></a></td>


                    <td class="tg-r1e8"><a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-outline-danger" name="hapus"><img width="20px" height="20px" src="tugas_web/delete.png" alt=""></a></td>

                    </form>
                    </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                <!--Akhir perulangan  -->
            </tbody>
            </table>
            </div>
        </div>

        <!-- Modal Create-->
        <div class="modal fade" id="Modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" for="Nama">Nama Mahasiswa</span>
                    <input type="text" class="form-control" id="Nama" name="Nama" required>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" for="Nim">Nim Mahasiswa</span>
                    <input type="text" class="form-control" id="Nim" name="Nim" required>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" for="Tugas">Nilai Tugas</span>
                    <input type="text" class="form-control" id="Tugas" name="Tugas" required>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" for="Uts">Nilai Uts</span>
                    <input type="text" class="form-control" id="Uts" name="Uts" required>
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1" for="Uas">Nilai Uas</span>
                    <input type="text" class="form-control" id="Uas" name="Uas" required>
                  </div>
                
              </div>

              <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-success" data-bs-dismiss="modal">Tambah</button>
                </form>
              </div>
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