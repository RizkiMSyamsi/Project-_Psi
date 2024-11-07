<?php
include("config.php");

// Kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: list-mahasiswa.php');
}

// Ambil id dari query string
$id = $_GET['id'];

// Buat query untuk ambil data dari database
$sql = "SELECT * FROM daftar_cals WHERE id=$id";
$query = mysqli_query($db, $sql);
$mahasiswa = mysqli_fetch_assoc($query);

// Jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulir Edit Data</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Data Calon Programmer dan Asisten Lab</h3>
    </header>

    <form action="proses-edit.php" method="POST" enctype="multipart/form-data">

        <fieldset>
            <input type="hidden" name="id" value="<?php echo $mahasiswa['id'] ?>" />

            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="Nama lengkap" value="<?php echo $mahasiswa['nama'] ?>" />
            </p>
            <p>
                <label for="npm">NPM: </label>
                <input type="text" name="npm" placeholder="NPM" value="<?php echo $mahasiswa['npm'] ?>" />
            </p>
            <p>
                <label for="kelas">Kelas: </label>
                <input type="text" name="kelas" placeholder="Kelas" value="<?php echo $mahasiswa['kelas'] ?>" />
            </p>
            <p>
                <label for="jurusan">Jurusan: </label>
                <input type="text" name="jurusan" placeholder="Jurusan" value="<?php echo $mahasiswa['jurusan'] ?>" />
            </p>
            <p>
                <label for="lokasi_kampus">Lokasi Kampus: </label>
                <input type="text" name="lokasi_kampus" placeholder="Lokasi Kampus" value="<?php echo $mahasiswa['lokasi_kampus'] ?>" />
            </p>
            <p>
                <label for="ttl">Tempat Tanggal Lahir: </label>
                <input type="text" name="ttl" placeholder="Tempat, Tanggal Lahir" value="<?php echo $mahasiswa['ttl'] ?>" />
            </p>
            <p>
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <?php $jk = $mahasiswa['jenis_kelamin']; ?>
                <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?>> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>> Perempuan</label>
            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"><?php echo $mahasiswa['alamat'] ?></textarea>
            </p>
            <p>
                <label for="no_hp">No. HP: </label>
                <input type="text" name="no_hp" placeholder="Nomor Handphone" value="<?php echo $mahasiswa['no_hp'] ?>" />
            </p>
            <p>
                <label for="email">Email: </label>
                <input type="email" name="email" placeholder="Alamat Email" value="<?php echo $mahasiswa['email'] ?>" />
            </p>
            <p>
                <label for="posisi">Posisi: </label>
                <select name="posisi">
                    <option value="asisten" <?php echo ($mahasiswa['posisi'] == 'asisten') ? "selected" : "" ?>>Asisten</option>
                    <option value="programmer" <?php echo ($mahasiswa['posisi'] == 'programmer') ? "selected" : "" ?>>Programmer</option>
                </select>
            </p>
            <p>
                <label for="ipk_terakhir">IPK Terakhir: </label>
                <input type="text" name="ipk_terakhir" placeholder="IPK Terakhir" value="<?php echo $mahasiswa['ipk_terakhir'] ?>" />
            </p>
            <p>
                <label for="cv">Upload File CV: </label>
                <input type="file" name="cv" accept=".pdf, .doc, .docx" />
            </p>
            <p>
                <label for="krs">Upload File KRS: </label>
                <input type="file" name="krs" accept=".pdf, .doc, .docx" />
            </p>
            <p>
                <label for="pas_foto">Upload Pas Foto: </label>
                <input type="file" name="pas_foto" accept="image/*" />
            </p>
            <p>
                <label for="ktm">Upload File KTM: </label>
                <input type="file" name="ktm" accept=".pdf, .png, .jpg, .jpeg" />
            </p>
            <p>
                <label for="ktp">Upload File KTP: </label>
                <input type="file" name="ktp" accept=".pdf, .png, .jpg, .jpeg" />
            </p>
            <p>
                <label for="rangkuman_nilai">Upload Certificate (Optional): </label>
                <input type="file" name="rangkuman_nilai" accept=".pdf, .doc, .docx" />
            </p>
            <p>
                <label for="certificate">Upload Certificate (Optional): </label>
                <input type="file" name="certificate" accept=".pdf, .doc, .docx" />
            </p>
            <p>
                <input type="submit" value="Simpan" name="simpan" />
            </p>
        </fieldset>
    </form>
</body>

</html>
