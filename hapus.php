<?php
include("config.php");

if (isset($_GET['id'])) {

    // Ambil id dari query string
    $id = $_GET['id'];

    // Buat query untuk mengambil data siswa sebelum dihapus
    $sqlGetData = "SELECT * FROM daftar_cals WHERE id=$id";
    $queryGetData = mysqli_query($db, $sqlGetData);
    $DataMahasiswa = mysqli_fetch_assoc($queryGetData);

    // Buat query hapus
    $sqlDelete = "DELETE FROM daftar_cals WHERE id=$id";
    $queryDelete = mysqli_query($db, $sqlDelete);

    // Apakah query hapus berhasil?
    if ($queryDelete) {

        // Hapus file-file terkait jika ada
        unlink("uploads/" . $DataMahasiswa['cv']);
        unlink("uploads/" . $DataMahasiswa['krs']);
        unlink("uploads/" . $DataMahasiswa['pas_foto']);
        unlink("uploads/" . $DataMahasiswa['ktm']);
        unlink("uploads/" . $DataMahasiswa['ktp']);
        unlink("uploads/" . $DataMahasiswa['rangkuman_nilai']);
        unlink("uploads/" . $DataMahasiswa['certificate']);

        header('Location: list-siswa.php');
    } else {
        die("Gagal menghapus...");
    }
} else {
    die("Akses dilarang...");
}
?>
