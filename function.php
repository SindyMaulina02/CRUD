<?php 
    $connect = mysqli_connect("localhost", "root", "", "system_absensi_perkuliahan");

    function query($query) {
        global $connect;
        $result = mysqli_query($connect, $query);
        $row = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data) {
        global $connect;

        $npm = $data["npm"];
        $nama_lengkap = $data["nama_lengkap"];
        $kelas = $data["kelas"];

        $query = "INSERT INTO absen VALUES ('', '$npm' , '$nama_lengkap', '$kelas')";
        mysqli_query($connect, $query);

        return mysqli_affected_rows($connect);
    }

    function ubah($data){
        global $connect;

        $id = $data["id"];
        $npm = $data["npm"];
        $nama_lengkap = $data["nama_lengkap"];
        $kelas = $data["kelas"];


        $query = "UPDATE absen SET
                    npm = '$npm',
                    nama_lengkap    = '$nama_lengkap',
                    kelas       = '$kelas'
                    WHERE id = $id 
        ";

        mysqli_query($connect, $query);

        return mysqli_affected_rows($connect);
    }

    function hapus($id) {
        global $connect;
        mysqli_query($connect, "DELETE FROM absen WHERE id = $id");
    
        return mysqli_affected_rows($connect);
    }

    function cari($keyword) {
        $query = "SELECT * FROM absen 
                    WHERE 
                    nama_lengkap LIKE '%$keyword%' OR
                    alamat LIKE '%$keyword%'
                ";
        return query($query);
    }
?>