<?php
include("config.php");

// Cek apakah tombol daftar sudah diklik atau belum
if (isset($_POST['daftar'])) {
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $lokasi_kampus = $_POST['lokasi_kampus'];
    $ttl = $_POST['ttl'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $posisi = $_POST['posisi'];
    $ipk_terakhir = $_POST['ipk_terakhir'];
    $cv = $_FILES['cv']['name'];
    $krs = $_FILES['krs']['name'];
    $pas_foto = $_FILES['pas_foto']['name'];
    $ktm = $_FILES['ktm']['name'];
    $ktp = $_FILES['ktp']['name'];
    $rangkuman_nilai = $_FILES['rangkuman_nilai']['name'];
    $certificate = $_FILES['certificate']['name'];

    // Folder tempat menyimpan file
    $folder = "uploads/";

    // Upload file
    move_uploaded_file($_FILES['cv']['tmp_name'], $folder.$cv);
    move_uploaded_file($_FILES['krs']['tmp_name'], $folder.$krs);
    move_uploaded_file($_FILES['pas_foto']['tmp_name'], $folder.$pas_foto);
    move_uploaded_file($_FILES['ktm']['tmp_name'], $folder.$ktm);
    move_uploaded_file($_FILES['ktp']['tmp_name'], $folder.$ktp);
    move_uploaded_file($_FILES['certificate']['tmp_name'], $folder.$certificate);

    // Buat query
    $sql = "INSERT INTO daftar_cals (nama, npm, kelas, jurusan, lokasi_kampus, ttl, jenis_kelamin, alamat, no_hp, email, posisi, ipk_terakhir, cv, krs, pas_foto, ktm, ktp, rangkuman_nilai, certificate)
            VALUES ('$nama', '$npm', '$kelas', '$jurusan', '$lokasi_kampus', '$ttl', '$jk', '$alamat', '$no_hp', '$email', '$posisi', '$ipk_terakhir', '$cv', '$krs', '$pas_foto', '$ktm', '$ktp', '$rangkuman_nilai', '$certificate')";
    $query = mysqli_query($db, $sql);

    // Apakah query simpan berhasil?
    if ($query) {
        // Jika berhasil, alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // Jika gagal, alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
?>
