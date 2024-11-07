<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Programmer dan Asisten Laboratorium Psikologi</title>
</head>

<body>
    <header>
        <h3>Mahasiswa yang sudah mendaftar</h3>
    </header>

    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </nav>

    <br>


    <table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Lokasi Kampus</th>
            <th>Tempat Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>NoHP</th>
            <th>Email</th>
            <th>Posisi</th>
            <th>IPK Terakhir</th>
            <th>CV</th>
            <th>KRS</th>
            <th>Pas Foto</th>
            <th>KTM</th>
            <th>KTP</th>
            <th>Rangkuman Nilai</th>
            <th>Certificate</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>

    <form method="GET" action="search.php">
    <label for="search">Cari Nama:</label>
    <input type="text" id="search" name="search">
    <button type="submit">Cari</button>
    </form>

    <button onclick="exportCSV()">Export to CSV</button>

    <script>
        function exportCSV() {
            window.location.href = 'export.php';
        }
    </script>


        <?php
        $sql = "SELECT * FROM daftar_cals";
        $query = mysqli_query($db, $sql);

        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$siswa['id']."</td>";
            echo "<td>".$siswa['nama']."</td>";
            echo "<td>".$siswa['npm']."</td>";
            echo "<td>".$siswa['kelas']."</td>";
            echo "<td>".$siswa['jurusan']."</td>";
            echo "<td>".$siswa['lokasi_kampus']."</td>";
            echo "<td>".$siswa['ttl']."</td>";
            echo "<td>".$siswa['jenis_kelamin']."</td>";
            echo "<td>".$siswa['alamat']."</td>";
            echo "<td>".$siswa['no_hp']."</td>";
            echo "<td>".$siswa['email']."</td>";
            echo "<td>".$siswa['posisi']."</td>";
            echo "<td>".$siswa['ipk_terakhir']."</td>";
            echo "<td><a href='uploads/".$siswa['cv']."'>Download</a></td>";
            echo "<td><a href='uploads/".$siswa['krs']."'>Download</a></td>";
            echo "<td><a href='uploads/".$siswa['pas_foto']."'>View</a></td>";
            echo "<td><a href='uploads/".$siswa['ktm']."'>Download</a></td>";
            echo "<td><a href='uploads/".$siswa['ktp']."'>Download</a></td>";
            echo "<td><a href='uploads/".$siswa['rangkuman_nilai']."'>Download</a></td>";
            echo "<td><a href='uploads/".$siswa['certificate']."'>Download</a></td>";

            echo "<td>";
            echo "<a href='form-edit.php?id=".$siswa['id']."'>Edit</a> | ";
            echo "<a href='hapus.php?id=".$siswa['id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

</body>
</html>
