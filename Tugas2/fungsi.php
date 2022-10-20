<?php
$conn = mysqli_connect("localhost", "root", "", "akademik");

$table_name = 'mahasiswa';
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
            nama VARCHAR(20) NOT NULL,
            nim int (5) NOT NULL,
            tugas int (5) NOT NULL,
            uts int (5) NOT NULL,
            uas int (5) NOT NULL
            )";
    
mysqli_query($conn, $sql);

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function add($data) {
    global $conn;
    $nama = htmlspecialchars($data["Nama"]);
    $nim = htmlspecialchars($data["Nim"]);
    $tugas = $data["Tugas"];
    $uts = $data["Uts"];
    $uas = $data["Uas"];

    $query = "INSERT INTO mahasiswa (id, nama, nim, tugas,  uts, uas)
                VALUES
               ('', '$nama', '$nim', '$tugas', '$uts', '$uas')"; 
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function read($data) {
    global $conn;
    $id = $_GET["id"];
    $mhs = "SELECT * FROM mahasiswa WHERE id = $id[0]";
    mysqli_query($conn, $mhs);

    return mysqli_affected_rows($conn);
}

function deletes($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function edit($data) {
    global $conn;
    $table_name = 'mahasiswa';

    $id = $data["Id"];
    $nim = htmlspecialchars($data["Nim"]);
    $nama = htmlspecialchars($data["Nama"]);
    $tugas = $data["Tugas"];
    $uts = $data["Uts"];
    $uas = $data["Uas"];

    $query = "UPDATE $table_name SET
               Nama = '$nama',
               Nim = '$nim',
               Tugas = '$tugas',
               Uts = '$uts',
               Uas = '$uas'
               WHERE Id = $id"; 
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>