<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $lokasi_kampus = $_POST['lokasi_kampus'];
    $ttl = $_POST['ttl'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $posisi = $_POST['posisi'];
    $ipk_terakhir = $_POST['ipk_terakhir'];

    // Update data ke database
    $sql = "UPDATE daftar_cals SET 
            nama='$nama', npm='$npm', kelas='$kelas', jurusan='$jurusan', 
            lokasi_kampus='$lokasi_kampus', ttl='$ttl', jenis_kelamin='$jenis_kelamin', 
            alamat='$alamat', no_hp='$no_hp', email='$email', posisi='$posisi', 
            ipk_terakhir='$ipk_terakhir' WHERE id=$id";

    $result = mysqli_query($db, $sql);

    // Handle file uploads (CV, KRS, Pas Foto, KTM, KTP, Rangkuman Nilai, Certificate)
    // Pastikan folder untuk menyimpan file sudah ada dan memiliki izin yang tepat
    $uploadDir = "uploads/"; // Ganti dengan folder yang sesuai di server Anda

    // Contoh pengelolaan file CV
    if ($_FILES['cv']['error'] == UPLOAD_ERR_OK) {
        $cvName = $_FILES['cv']['name'];
        $cvTmpName = $_FILES['cv']['tmp_name'];
        move_uploaded_file($cvTmpName, $uploadDir . $cvName);
        // Simpan nama file CV ke database jika diperlukan
        $cvSql = "UPDATE daftar_cals SET cv='$cvName' WHERE id=$id";
        mysqli_query($db, $cvSql);
    }
    if ($_FILES['krs']['error'] == UPLOAD_ERR_OK) {
        $krsName = $_FILES['krs']['name'];
        $krsTmpName = $_FILES['krs']['tmp_name'];
        move_uploaded_file($krsTmpName, $uploadDir . $krsName);
        // Simpan nama file CV ke database jika diperlukan
        $krsSql = "UPDATE daftar_cals SET krs='$krsName' WHERE id=$id";
        mysqli_query($db, $krsSql);
    }
    if ($_FILES['pas_foto']['error'] == UPLOAD_ERR_OK) {
        $pas_fotoName = $_FILES['pas_foto']['name'];
        $pas_fotoTmpName = $_FILES['pas_foto']['tmp_name'];
        move_uploaded_file($pas_fotoTmpName, $uploadDir . $pas_fotoName);

        $pas_fotoSql = "UPDATE daftar_cals SET pas_foto='$pas_fotoName' WHERE id=$id";
        mysqli_query($db, $pas_fotoSql);
    }

    if ($_FILES['ktm']['error'] == UPLOAD_ERR_OK) {
        $ktmName = $_FILES['ktm']['name'];
        $ktmTmpName = $_FILES['ktm']['tmp_name'];
        move_uploaded_file($ktmTmpName, $uploadDir . $ktmName);

        $ktmSql = "UPDATE daftar_cals SET ktm='$ktmName' WHERE id=$id";
        mysqli_query($db, $ktmSql);
    }

    if ($_FILES['ktp']['error'] == UPLOAD_ERR_OK) {
        $ktpName = $_FILES['ktp']['name'];
        $ktpTmpName = $_FILES['ktp']['tmp_name'];
        move_uploaded_file($ktpTmpName, $uploadDir . $ktpName);

        $ktpSql = "UPDATE daftar_cals SET ktp='$ktpName' WHERE id=$id";
        mysqli_query($db, $ktpSql);
    }

    if ($_FILES['rangkuman_nilai']['error'] == UPLOAD_ERR_OK) {
        $rangkuman_nilaiName = $_FILES['rangkuman_nilai']['name'];
        $rangkuman_nilaiTmpName = $_FILES['rangkuman_nilai']['tmp_name'];
        move_uploaded_file($rangkuman_nilaiTmpName, $uploadDir . $rangkuman_nilaiName);

        $rangkuman_nilaiSql = "UPDATE daftar_cals SET rangkuman_nilai='$rangkuman_nilaiName' WHERE id=$id";
        mysqli_query($db, $rangkuman_nilaiSql);
    }

    if ($_FILES['certificate']['error'] == UPLOAD_ERR_OK) {
        $certificateName = $_FILES['certificate']['name'];
        $certificateTmpName = $_FILES['certificate']['tmp_name'];
        move_uploaded_file($certificateTmpName, $uploadDir . $certificateName);

        $certificateSql = "UPDATE daftar_cals SET certificate='$certificateName' WHERE id=$id";
        mysqli_query($db, $certificateSql);
    }



    if ($result) {
        echo "Data berhasil diupdate.";
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($db);
    }
} else {
    // Redirect jika tidak ada data POST
    header('Location: list-mahasiswa.php');
}
?>
